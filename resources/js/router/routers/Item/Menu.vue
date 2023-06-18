<template>
    <div class="static">
<img src="../../../../static/img/SamKursk.png" alt="">
<div class="staticName cnt">
    <h1>Товар</h1>
</div>
<Samokat/>
<MiniSigvey/>
<Monocart/>
<Block/>
    </div>
</template>

<script>
import Samokat from "../../../components/Menu/Samokat.vue";
import MiniSigvey from "../../../components/Menu/MiniSigvey.vue";
import Monocart from "../../../components/Menu/Monocart.vue";
import Block from "../../../components/Menu/Block.vue";

    export default ({
components:{
    Samokat, MiniSigvey, Monocart, Block
}
    })
</script>

<style lang="scss">
.static{
    img{
        width: 100%;
    }
}
</style>
