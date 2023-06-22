<template>
    <div class="p-t">
        <div class="ProductPage ">
            <div class="ProductPageCart">
                <div class="ProductPageCartTitle">
                    <div class="ProductPageCartTitleSlider">
                        <img :src="'/storage/' + img" alt="" class="ProductPageCartTitleSliderImg">
                        <div class="ProductPageCartTitleImg">
                            <img :src="'/storage/' + slide.image" alt="" @click="setImg(slide.image)"
                                v-for="slide in  productData.imgs" :key="slide">
                        </div>
                        <h4>Цена:{{ productData.price }}Р</h4>
                        <div class="ProductPageCartBuy">
                            <button :class="!isCart ? ' ProductPageCartBuyCart' : 'ProductPageCartBuyCart_off'"
                                @click="addCart()"><img src="../../../static/img/shopping-cart.png" alt="">
                                купить</button>

                        </div>

                    </div>

                    <div>
                        <h2>{{ productData.name }}</h2>
                        <p>{{ productData.description }}</p>
                    </div>

                </div>


            </div>
            <div class="ProductPageCartComment">

            </div>
        </div>
    </div>
</template>

<script>
export default {

    mounted() {
        this.getProduct()


    },
    methods: {
        addCart() {
            if (!this.productData) {
                return false
            }
            if (this.$root.cart.indexOf(this.productData.id) >= 0) {
                this.$root.cart.splice(this.$root.cart.indexOf(this.productData.id), 1)
            }
            else {
                this.$root.cart.push(this.productData.id)
            }
            localStorage.setItem("cart", JSON.stringify(this.$root.cart))
        },
        getProduct() {
            fetch("/api/product_item/" + this.$route.params.id).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data

                    if (this.productData.imgs.length > 0) {

                        this.img = this.productData.imgs[0].image
                    }
                }
            })
        },
        setImg(img) {
            this.img = img
        }
    },
    computed: {
        isCart() {
            if (this.$root.cart.indexOf(this.productData.id) >= 0) {
                return true
            }
            return false
        }
    },

    data() {
        return {
            productData: {},
            img: '',
  
        }
    }
}
</script>

<style lang="scss">
.ProductPage {
    flex: 200px 1;
    padding: 50px;
    display: flex;
    flex-direction: column;

    &Cart {
        padding: 25px;
        border-radius: 20px;
        flex: 200px 1;
        background: white;

        &Buy {
            padding: 5px 0;

            &Cart {
                background: #05c855;

            }

            &Cart_off {
                background: #e2760a;

            }

            button {

                height: 40px;
                border-radius: 5px;
                color: white;
                display: flex;
                gap: 10px;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    filter: invert(1);
                    cursor: pointer;
                }
            }
        }

        &Title {
            display: flex;

            gap: 20px;


            &Slider {

                width: 300px;
                display: flex;
                flex-direction: column;


                &Img {
                    height: 400px;
                    border-radius: 10px;
                    object-fit: contain;
                    padding-bottom: 10px;
                    cursor: pointer;
                }
            }

            &Img {
                height: 100px;
                width: 500px;
                display: flex;
                gap: 10px;

                img {
                    height: 100%;
                    border-radius: 10px;
                    object-fit: contain;
                    opacity: 0.5;
                    transition: 0.3s;
                    cursor: pointer;

                    &:hover {
                        opacity: 1;
                    }
                }
            }
        }
    }

}
</style>
