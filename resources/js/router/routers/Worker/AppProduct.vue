<template>
    <div class="">
        <div class="AdminEditCartitem">
            <h4>Создать </h4>
            <h5>Название</h5>
            <input type="text" v-model="name" />
            <h5>Цена</h5>
            <input type="number" v-model="price" min="0" />
            <h5>Рейтинг</h5>
            <input type="number" v-model="reting" max="5" min="0" />

            <h5>Описание</h5>
            <input type="text" v-model="description" />
            <h5>изображение</h5>
            <input type="file" name="" id="filesimg" multiple />
            <h5>Категории</h5>
            <select v-model="categories_id" class="background-black color-gray-f">
                <option disabled value="0">выберите категорию</option>
                <option :value="categor.id" v-for="categor in categories" :getProduct="getProduct" :key="categor.id">{{
                    categor.name }}</option>

            </select>
            <button class="background-grean" @click="AppTovar()">
                Создать
            </button>
        </div>

        <div class="AdminEditCartitem">
            <div class="AdminEditCartitemProduct">
                <Product v-for="productItem in productData" :key="productItem.id" :dell="1" :productItem="productItem" />

            </div>
        </div>
    </div>
</template>

<script>
import Product from "../../../components/Product/ProductItem.vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    components: {
        Product
    },
    data() {
        return {
            name: '',
            price: '',
            products_id: '',
            tags: '',
            description: '',
            reting: '',
            categories_id: 0,
            categories: [],
            productData: []
        }
    },

    mounted() {
        this.getCategoris()

        this.getProduct()
    },
    methods: {
        getProduct() {
            fetch("/api/product").then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data
                }
            })
        },

        getCategoris() {
            fetch("/api/get_categories").then(r => r.json()).then(r => {
                if (r.data) {
                    this.categories = r.data
                }
            })

        },
        async AppTovar() {
            const files = await document.querySelector("#filesimg");
            const Form = new FormData();
            await Form.append("name", this.name);
            await Form.append("price", this.price);
            await Form.append("description", this.description);
            await Form.append("categories_id", this.categories_id);

            const ins = files.files.length;
            for (let x = 0; x < ins; x++) {
                await Form.append("files[]", files.files[x]);
            }
            await fetch("/api/add_product", {
                method: "POST",
                body: Form,
                headers: {
                    Accept: "multipart/form-data",
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
            }).then(r => {
                if (r.status == 204) {
                    toast.success("Товар добавлен успешно !", {
                        autoClose: 4000,
                    });

                    this.getProduct()
                    return r.json()
                }
                return null
            }).catch((err) => {
                if (err.response) {

                }
            })
        }
    }
}
</script>

<style lang="scss" scoped>
.AdminEditCartitemProduct {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: start;
}

select {
    margin: 10px 0;
}
</style>
