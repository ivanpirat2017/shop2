
<template>
    <div class="Product">
        <div class="ProductInfo">
            <img :src="img" alt="" class="img-product">
            <div class="ProductInfoName">
                <h4>{{ product.name }}</h4>

            </div>

        </div>
        <div>
            <h5>{{ product.price }} ₽</h5>
            <button class="del" @click="removeCart()">Удилить</button>
        </div>

    </div>
</template>

<script >
export default {
    props: ["product", "getProduct"],
    data() {
        return {
            img: ''
        }
    },
    mounted() {
        if (this.product.imgs) {
            const imgs = this.product.imgs
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
    methods: {
        removeCart() {
            this.$root.cart.splice(this.$root.cart.indexOf(this.product.id), 1)
            localStorage.setItem("cart", JSON.stringify(this.$root.cart))
            this.getProduct()
        }
    },
}
</script>

<style lang='scss'>
.Product {
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;

    @media screen and (max-width: 1100px) {
        height: 100%;
        flex-direction: column;
    }

    .img-product {
        width: 100px;
        object-fit: contain;
        padding: 5px;
    }

    &Info {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;

        @media screen and (max-width: 1100px) {
            flex-direction: column;
            margin-top: 5%;
        }
    }

    &Btn {
        display: flex;
        align-items: center;
        border: 1px solid black;
        background: rgba(158, 156, 156, 0.281);

        @media screen and (max-width: 1100px) {
            margin-top: 5%;
        }

        button {
            width: 40px;
            height: 40px;
            background: none;
            border: none;
        }

        P {
            padding: 0 10px;
        }
    }

    .del {
        width: 100px;
        background: red;

        @media screen and (max-width: 1100px) {
            margin-top: 5%;
        }
    }

}
</style>
