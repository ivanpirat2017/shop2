
<template>
    <div class="Cart cnt">
        <h1>Корзина</h1>
        <Product/>
        <div class="CartPOlos"></div>
        <div class="CartNike">
            <h3>Сумма: 74 990</h3>
        </div>
        <h1>Оформление заказа</h1>
        <AppProduct/>
        <button class="appbtn">Оформить заказ</button>
    </div>


</template>

<script >
import Product from "../../../components/Cart/Product.vue";
import AppProduct from "../../../components/Cart/AppProduct.vue"
    export default {
        components:{
            Product, AppProduct
        }
    }
</script>

<style lang='scss'>
.Cart{
    &POlos{
        width: 100%;
        border: black 1px solid;
        border-radius: 100%;
        margin: 5% 0;
    }
    .appbtn{
        width: 30%;
         height: 40px;
        border-radius: 5px;
        background: rgb(21, 134, 209);
        color: white;
    }
}
</style>
