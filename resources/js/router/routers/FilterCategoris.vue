<template>
    <div class="cnt">
        <h2>{{ $route.params.name }}</h2>
        <div class="HomeProducts ">
            <ProductItem v-for="productItem in productData" :key="productItem.id" :productItem="productItem" />
        </div>

    </div>
</template>



<script>



import ProductItem from "../../components/Product/ProductItem.vue";
export default {
    components: {
        ProductItem
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            fetch("/api/product/" + this.$route.params.id).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data
                }
            })
        }
    },
    data() {
        return {
            productData: []
        }
    }
};
</script>
<style lang="scss" scoped>
.Home {
    &Products {
        padding: 5px 0 10px 0;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: start;
    }
}

.fon {
    img {
        width: 100%;
        object-fit: cover;
    }
}
</style>
