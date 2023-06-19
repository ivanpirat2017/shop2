
<template>
    <div class="MenuTovarBox">
        <img :src="img" alt="">
        <div>
            <div class="MenuTovarBoxText">
                <h4>{{ productItem.name }}</h4>
                <h5>{{ productItem.price }} p</h5>
            </div>
            <div class="MenuTovarBoxBtn">
                <button class="btn-cart"><img src="../../../static/img/shopping-cart.png" alt=""></button>
                <button class="btn-link">Перейти</button>

            </div>

        </div>
    </div>
</template>

<script >
import imgDefault from "../../../static/img/nino.jpg"
export default {
    props: ["productItem"],
    data() {
        return {
            img: ''
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

            max-width: 200px;
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
