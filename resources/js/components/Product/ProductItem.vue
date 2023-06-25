
<template>
    <div class="MenuTovarBox">
        <img :src="img" alt="">
        <div>
            <div class="MenuTovarBoxText">
                <h4>{{ productItem.name }}</h4>
                <h4>Рейтиг: {{ productItem.reting }}</h4>
                <h5>{{ productItem.price }} p</h5>
            </div>
            <div class="MenuTovarBoxBtn">
                <button :class="!isCart ? ' btn-cart' : 'btn-cart-off'" @click=" addCart()"><img
                        src="../../../static/img/shopping-cart.png" alt=""></button>
                <button class="btn-link" @click="$router.push('/product/' + productItem.id)">Перейти</button>
                <button v-if="dell == 1" style="background: #cc2828;" class="btn-link" @click="getDel">Удалить</button>

            </div>

        </div>
    </div>
</template>

<script >
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import imgDefault from "../../../static/img/nino.jpg"
export default {
    props: ["productItem", "dell", "getProduct"],
    data() {
        return {
            img: ''
        }
    },
    computed: {
        isCart() {
            if (this.$root.cart.indexOf(this.productItem.id) >= 0) {
                return true
            }
            return false
        }
    },
    methods: {
        getDel() {

            fetch("/api/product_delete/" + this.productItem.id, {
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
                if (r.status == 204) {
                    this.getProduct( )
                    toast.success("Товар удален успешно !", {
                        autoClose: 4000,
                    });
                }
                return r.json()
            }).then((r) => {
                if (!r) {
                    return
                }
                this.orders = r.data

            })
        },
        addCart() {
            if (this.$root.cart.indexOf(this.productItem.id) >= 0) {
                this.$root.cart.splice(this.$root.cart.indexOf(this.productItem.id), 1)
            }
            else {
                this.$root.cart.push(this.productItem.id)
            }
            localStorage.setItem("cart", JSON.stringify(this.$root.cart))
        }
    },
    mounted() {
        if (this.productItem.imgs) {
            const imgs = this.productItem.imgs
            if (imgs.length > 0) {
                this.img = imgs[0].image
                if (this.img == "") {
                    this.img = imgDefault
                }
                else {
                    this.img = "/storage/" + this.img
                }
            }
        }

    },

}
</script>

<style lang='scss' scoped>
.Menu {
    &Tovar {

        &Box {

            width: 300px;
            border-radius: 5px;
            box-shadow: 7px 9px 8px 0px rgba(34, 60, 80, 0.2);
            background: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;

            @media (max-width: 700px) {
                max-width: 150px;
            }

            img {
                height: 200px;
                object-fit: cover;
                border-radius: 5px;
            }

            &Btn {
                display: flex;
                gap: 15px;
                justify-content: space-between;

                button {

                    height: 40px;
                    border-radius: 5px;
                    color: white;

                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: contain;
                        filter: invert(1);
                    }
                }

                .btn-cart {
                    background: #05c855;
                    width: 40px;
                }

                .btn-cart-off {
                    background: #fa5c0d;
                    width: 40px;
                }

                .btn-link {
                    background: #2a1af4;
                    flex: 100px;
                }
            }

            &Text {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 5px;

                h4 {
                    font-size: 1rem;
                }



            }
        }
    }
}
</style>
