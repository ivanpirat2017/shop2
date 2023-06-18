
<template>
<div class="Product">
    <div class="ProductInfo">
        <img src="../../../static/img/nino.jpg" alt="" class="img-product">
        <div class="ProductInfoName">
        <h3>Электросамокат</h3>
        <h1>74 990 ₽</h1>
        </div>
    </div>
    <div class="ProductBtn">
        <button>-</button>
        <p>1</p>
        <button>+</button>
    </div>
    <h1>74 990 ₽</h1>
    <button class="del">Удилить</button>
</div>
</template>

<script >
export default {

    }
</script>

<style lang='scss'>
.Product{
    display: flex;
    align-items: center;
    justify-content: space-around;
    @media screen and (max-width: 1100px){
        height: 100%;
            flex-direction: column;
        }
    .img-product{
        width: 150px;
    }
    &Info{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        @media screen and (max-width: 1100px){
            flex-direction: column;
            margin-top: 5%;
        }
    }
    &Btn{
        display: flex;
        align-items: center;
        border: 1px solid black;
        background: rgba(158, 156, 156, 0.281);
        @media screen and (max-width: 1100px){
            margin-top: 5%;
        }
        button{
            width: 40px;
            height: 40px;
            background: none;
            border: none;
        }
        P{
            padding: 0 10px;
        }
    }
    .del{
        width: 100px;
        height: 30px;
        font-weight: bold;
        @media screen and (max-width: 1100px){
            margin-top: 5%;
        }
    }

}
</style>
