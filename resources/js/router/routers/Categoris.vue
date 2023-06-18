<template>
<div class="cnt p-t Categoris">
    <div class="Categorisblock">
        <img src="../../../static/img/carting.png" alt="">
        <p>Электрокартинг</p>
    </div>
    <div class="Categorisblock">
        <img src="../../../static/img/samokat.png" alt="">
        <p>Электросамокат</p>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.Categoris{
    padding-top: 10%;
    width: 40%;
    display: flex;
    justify-content: space-around;
    &block{
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 2%;
        background: white;
        border-radius: 10px;
        img{
            width: 100%;
        }
    }
}
</style>
