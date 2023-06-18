<template>
    <div class="fon">
        <img src="../../../static/img/SamKursk.png" alt="">
    </div>
    <div class="cnt">
        <h2>Актуальные товары</h2>
        <div class="HomeProducts ">
            <Product v-for="productItem in productData" :key="productItem.id" :productItem="productItem" />
        </div>

    </div>


    <!-- <Loader  /> -->
    <Block />
</template>
<script>
import Fon from "../../../static/img/SamKursk.png";
import Loader from "../../components/Loader.vue";
import Block from "../../components/Block.vue";
import Product from "../../components/Product/ProductItem.vue";
export default {
    components: {
        Block,
        Loader,
        Product
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            fetch("api/product").then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data
                }
            })
        }
    },
    data() {
        return {
            BotFon: Fon,
            productData: []
        }
    }
};
</script>
<style lang="scss">
.Home {
    &Products {
        padding:  5px 0 10px 0;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: space-between;
    }
}

.fon {
    img {
        width: 100%;
        object-fit: cover;
    }
}
</style>
