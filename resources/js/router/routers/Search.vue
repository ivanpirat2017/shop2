<template>
    <div class="p-t cnt">
        <div class="Search">
            <h2>Поиск</h2>
            <div class="SearchInput border-gray">
                <input type="text" @input="getProduct()" v-model="searchText" placeholder="Что хотите найти?" />
                <img src="../../../static/img/search.png" alt="" @click="getProduct()" />
            </div>

            <div class="SearchSelect" v-if="sortArr.length != 0">
                <select v-model="sortnum" class="background-black color-gray-f">
                    <option value="1">популярные</option>
                    <option value="2">цена по возрастанию</option>
                    <option value="3">цена по убыванию</option>
                </select>
                <h5>Товар</h5>
                <div class="SearchProducts">
                    <Product v-for="productItem in sortArr" :key="productItem.id" :productItem="productItem" />
                </div>
            </div>
            <div>
                <h5>По вашему запросу ничего не нашлось</h5>
            </div>



        </div>
    </div>
</template>

<script>
import Product from "../../components/Product/ProductItem.vue";
export default {
    components: {
        Product
    },
    methods: {
        getProduct() {
            fetch("api/product?limit=100&query=" + this.searchText).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data
                }
            })
        }
    },
    computed: {
        sortArr() {
            if (this.sortnum == 1) {
                return this.productData;
            }
            if (this.sortnum == 2) {
                function compareNumeric(a, b) {
                    if (a.price > b.price) return 1;
                    if (a.price == b.price) return 0;
                    if (a.price < b.price) return -1;
                }
                return this.productData.sort(compareNumeric);
            }
            if (this.sortnum == 3) {
                function compareNumeric(a, b) {
                    if (a.price > b.price) return -1;
                    if (a.price == b.price) return 0;
                    if (a.price < b.price) return 1;
                }
                return this.productData.sort(compareNumeric);
            }
        },
    },
    data() {
        return {
            searchText: "",
            productData: [],
            sortnum: 1
        }
    }
}
</script>

<style lang="scss">
.Search {
    h2 {
        margin: 20px 0 10px 0;
    }

    &Products {
        padding: 5px 0 10px 0;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: start;
    }

    h5 {
        margin: 20px 0 10px 0;
    }

    &Select {
        padding: 20px 0;

        h5 {
            padding: 5px 0;
        }
    }

    &Input {
        display: flex;
        height: 40px;
        gap: 15px;
        padding: 10px;
        border-radius: 10px;

        input {
            padding: 0;
            height: 100%;
        }

        img {
            cursor: pointer;
            transition: 0.2s;

            &:hover {
                transform: scale(1.1);
            }
        }
    }
}
</style>
