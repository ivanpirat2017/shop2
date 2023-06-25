<template>
    <div class=" cnt">
        <div class="p-t">
            <div class="Profile">
                <h1>Кабинет заказов</h1>
                <h3>Здравствуйте,Артем</h3>
                <div class="ProfileItems" v-if="orders != 0">
                    <div class="ProfileItemsOrder" v-for="order in orders" :key="order.id">
                        <h3>Заказ: <span>{{ order.code }}</span></h3>
                        <div class="ProfileItemsOrderS">
                            <OrderProductItem :productItem="product" v-for="product in order.products" :key="product.id" />
                        </div>
                        <h5>Адрес доставки {{ order.adress.adress_point }}</h5>
                        <h4>Сумма заказа {{ order.sum }}р</h4>
                    </div>
                </div>
                <h3 class="color-gray-f" v-else>
                    У вас нет заказов
                </h3>

            </div>

        </div>
    </div>
</template>

<script>
import OrderProductItem from "../../components/Product/OrderProductItem.vue";
export default {
    components: { OrderProductItem },
    data() {
        return {
            orders: []
        }
    },
    mounted() {
        this.getOrder()
    },
    methods: {
        getOrder() {

            fetch("/api/order", {
                method: "GET",
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },

            }).then(r => {
                if (r.status == 401) {
                    this.$router.push("/login");
                    return null
                }
                if (r.status == 422) {
                    return null
                }
                return r.json()
            }).then((r) => {
                if (!r) {
                    return
                }

                this.orders = r.data

            })
        },
    }
}
</script>

<style lang="scss" scoped>
.Profile {
    &Items {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;


        &Order {
            flex: 500px 1;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 20px;
            padding: 10px;


            h3 {
                span {
                    background: #00b44a;
                    padding: 2px;
                    border-radius: 5px;
                    color: white;
                }
            }

            &S {
                flex-wrap: wrap;
                gap: 20px;
                display: flex;
            }
        }
    }
}
</style>
