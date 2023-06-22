<template>
    <div class=" cnt">
        <div class="p-t">
            <h1>корзина</h1>
            <div class="Cart">
                <CartProductItem v-for="(product, index) in productData.data" :key="index" :product="product"
                    :getProduct="getProduct" />
            </div>
            <h3 class="color-gray-f" v-if="productData.data != 0">
                Приблизительная сумма к оплате
                <span class="color-oreng">{{ productData.sum }}р</span>
            </h3>
            <div class="CartPreviewBtns" v-if="productData.data != 0">
                <button class="background-indigo" @click="CreateOrder()">
                    Оформить заказ
                </button>
                <button class="background-red" @click="delAll()">Очистить корзину</button>
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
            productData: [],
            CreateApi: false,
        }
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        CreateOrder() {
            if (this.CreateApi) {
                return "";
            }
            this.CreateApi = true;
            const Form = new FormData();
            Form.append("products_buy", localStorage.getItem("cart"));
            fetch("/api/add_order", {
                method: "POST",
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
                data: Form,
            }).then(r => {
                if (r.status == 401) {
                    this.$router.push("/login");
                    return null
                }

                return r.json()
            }).then((r) => {
                if (!r) {
                    return
                }
                this.delAll();
                this.$router.push("/profile");
            })
        },
        delAll() {
            localStorage.removeItem("cart");
            this.$root.cart = [];
            this.productData = [];
        },
        getProduct() {
            const fotm = new FormData()
            fotm.append("products_buy", localStorage.getItem("cart"))
            fetch("/api/cart", {
                method: "POST",
                body: fotm
            }).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r
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
    flex-wrap: wrap;
}

.CartPreview {
    &Btns {
        display: flex;
        gap: 10px;

        button {}
    }

    &items {
        display: flex;
        border-top: 2px solid rgba(128, 128, 128, 0.2);
        border-bottom: 2px solid rgba(128, 128, 128, 0.2);
        flex-wrap: wrap;
        gap: 10px;
        padding: 15px 0;

        &item {

            padding: 15px;
            border-radius: 5px;
            display: flex;
            flex: 1 1 400px;
            flex-direction: column;

            &options {
                display: flex;
                flex-direction: column;
                gap: 5px;

                div {
                    display: flex;
                    padding: 10px;

                    border-radius: 5px;
                    justify-content: space-between;

                    P {
                        &:nth-child(2) {
                            padding-left: 20px;
                        }
                    }
                }
            }
        }
    }
}
</style>
