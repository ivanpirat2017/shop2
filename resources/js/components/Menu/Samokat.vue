<template>
<div class="Menu cnt-tovar">
    <div class="MenuFon">
        <h2>Электросамокаты</h2>
        <button>Перейти в раздел</button>
    </div>
    <div class="MenuTovar">
        <div class="MenuTovarBox">
            <img src="../../../static/img/nino.jpg" alt="">
            <div>
            <h1>Ninebot Air T 15</h1>
            <div class="text">
            <p>В наличии</p>
            <h3>49 990 p</h3>
            </div>
            <button class="btn-menu">Перейти</button>
            </div>
        </div>
        <div class="MenuTovarBox">
            <img src="../../../static/img/nino.jpg" alt="">
            <div>
            <h1>Ninebot Air T 15</h1>
            <div class="text">
            <p>В наличии</p>
            <h3>49 990 p</h3>
            </div>
            <button class="btn-menu">Перейти</button>
            </div>
        </div>
        <div class="MenuTovarBox">
            <img src="../../../static/img/nino.jpg" alt="">
            <div>
            <h1>Ninebot Air T 15</h1>
            <div class="text">
            <p>В наличии</p>
            <h3>49 990 p</h3>
            </div>
            <button class="btn-menu">Перейти</button>
            </div>
        </div>

    </div>

</div>
</template>

<script >

    export default ({

    })
</script>

<style lang='scss'>
.Menu{
    display: flex;
    justify-content: space-between;
    @media screen and (max-width: 700px){
            align-items: center;
            justify-content: center;
        }
    &Fon{
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        width: 500px;
        height: 640px;
        background: #00000048;
        background: url(../../../static/Tovar/main-f-series--640.jpg) center center/cover no-repeat;
        @media screen and (max-width: 700px){
            width: 100%;
        }
    }
    h2{
        color: rgb(255, 251, 0);
        font-size: 2em;
        margin: 3%;
    }
    button{
        border: white solid 2px;
        background: none;
        color: white;
        width: 250px;
        height: 45px;
        transition: all 0.5s;
        margin: 3%;
        hover{
            background: white;
            color: black;
        }
    }
    &Tovar{
        width: 70%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        @media screen and (max-width: 1300px){
            display: none;
        }
        &Box{
            width: 300px;
            height: 95%;
            border-radius: 5px;
            box-shadow: 7px 9px 8px 0px rgba(34, 60, 80, 0.2);
            background: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 0 2%;
            div{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                .btn-menu{
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
