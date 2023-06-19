<template>
    <div class="p-t">
        <div class="ProductPage ">
            <div class="ProductPageCart">
                <div class="ProductPageCartTitle">
                    <div class="ProductPageCartTitleSlider">
                        <carousel :items-to-show="1.5">
                            <slide v-for="slide in  productData.imgs" :key="slide">
                                <img :src="'/storage/' + slide.image" alt="" class="ProductPageCartTitleImg">
                            </slide>

                            <template #addons>
                                <navigation />
                                <pagination />
                            </template>
                        </carousel>
                    </div>

                    <div>
                        <h2>{{ productData.name }}</h2>
                        <p>{{ productData.description }}</p>
                    </div>

                </div>



            </div>
        </div>
    </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
export default {
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            fetch("/api/product_item/" + this.$route.params.id).then(r => r.json()).then(r => {
                if (r.data) {
                    this.productData = r.data[0]
                }
            })
        }
    },
    data() {
        return {
            productData: {}
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

        &Title {
            display: flex;
            gap: 50px;
            flex-direction: column;

            &Slider {
                height: 400px;
            }

            &Img {
                height: 400px;

            }
        }
    }

}
</style>
