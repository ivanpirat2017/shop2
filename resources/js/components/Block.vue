<template>
<div class="Car cnt">
        <img src="../../static/img/Foncar.png" alt="">
        <div class="CarBlock">
            <img class="blockcar" src="../../static/img/Fontrayf.png" alt="">
            <img class="blockcar"  src="../../static/img/Fonres.png" alt="">
        </div>
    </div>
</template>

<script>

export default {


}
</script>

<style lang="scss">
.Car{
    display: flex;
    flex-direction: column;
    &Block{
        margin-top: 3%;
        display: flex;
        justify-content: space-between;
        @media (max-width: 1300px){
            .blockcar{
                width: 100%;
                margin-top: 3%;
            }
        }
        .blockcar{
            width: 48%;
        }
    }

}
</style>
