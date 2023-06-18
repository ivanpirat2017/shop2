
<template>
    <div class="MenuTovarBox">
        <img :src="img" alt="">
        <div>
            <h4>{{ productItem.name }}</h4>
            <div class="text">
                <h5>{{ productItem.price }} p</h5>
            </div>
            <button class="btn-menu">Перейти</button>
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

            max-width: 300px;
            border-radius: 5px;
            box-shadow: 7px 9px 8px 0px rgba(34, 60, 80, 0.2);
            background: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;

            @media (max-width: 700px) {
                max-width: 200px;
            }

            div {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 5px;

                .btn-menu {
                    width: 100%;
                    height: 40px;
                    border-radius: 5px;
                    background: rgb(21, 134, 209);
                    color: white;
                }

            }
        }
    }
}
</style>
