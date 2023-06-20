<template>
    <div class=" cnt">
        <div class="p-t">
            <h1>карт</h1>
            <div class="Cart">
                <CartProductItem v-for="(product, index) in productData" :key="index" :product="product" :getProduct="getProduct" />
            </div>

        </div>

    </div>
</template>

<script>
import CartProductItem from "../../components/Product/CartProductItem.vue";
export default {
    components: {
        CartProductItem
    },
    data() {
        return {
            productData: []
        }
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            const fotm = new FormData()
            fotm.append("products_buy", localStorage.getItem("cart"))
            fetch("/api/cart", {
                method: "POST",
                body: fotm
            }).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data
                }
            })
        }
    },
}
</script>

<style lang="scss" scoped>
.Cart {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
</style>
