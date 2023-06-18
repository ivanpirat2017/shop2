<template>
<div  class="ServiceoptionCart background-100">
        <div class="ServiceoptionCartCircl background-black">
            <h4 class="color-grean m-b-2" >+</h4>
            <h4 class="color-red m-b-5" >-</h4>
        </div>
        <div class="ServiceoptionCartCircl background-black" >
            <router-link :to="'/'">
                <h4 class="color-grean m-b-2">+</h4>
            </router-link>
        </div>
        <div class="ServiceoptionCartText">
            <p>dsfgdf</p>
            <div>
                <img  src="../../static/img/delivery.png" alt="">
                <p>20000 Р</p>

            </div>

        </div>
        <button class="background-red">
            X
        </button>
        <Popup  :clickclose="clickclose" :title="'Удалить услугу'"
            :text="'Вы действительно хотите удалить услугу ?'" :namebtn="'Удалить'"  />
    </div>
</template>

<script>
import Popup from "../components/Popup.vue";
export default {
    components: {
        Popup,
    },
}
</script>

<style lang="scss">
.ServiceoptionCart {
    transition: 0.5s;
    flex: 1 1 100%;

    justify-content: space-between;
    align-items: center;
    padding: 5px;
    border-radius: 10px;
    display: flex;
    gap: 15px;

    &Text {
        display: flex;
        justify-content: space-between;
        width: 100%;
        gap: 15px;

        div {
            display: flex;

            img {
                height: 30px;
            }

            gap: 5px;

            P {
                white-space: nowrap;
            }
        }

        @media (max-width: 450px) {
            flex-direction: column;
            gap: 5px;
        }

        P {
            &:nth-child(1) {}


        }
    }

    &Circl {
        padding: 5px;

        display: flex;
        align-items: center;
        flex-shrink: 0;
        justify-content: center;
        cursor: pointer;
        height: 25px;
        width: 25px;
        border-radius: 100%;
        font-size: 2em;
        text-align: center;

        h4 {
            padding: 0;
            text-align: center;
        }
    }
}

.m-b-5 {
    margin-bottom: 5px;
}

.m-b-2 {
    margin-bottom: 2px;
}
</style>
