
<template>
    <div class="Profile cnt">
        <div class="ProfileName">
            <h2>Здраствйуте: Artem</h2>
            <button>Выйти</button>
        </div>
        <div class="ProfileTablee">
    <table class="">
   <tr>
    <th>Номер заказа</th>
    <th>Стадия</th>
    <th>Доставка</th>
    <th>Дата Заказа</th>
    <th>Время доставки</th>
   </tr>
   <tr><td>1 Заказ</td><td>Оплачен</td><td>В сборе</td><td>23.4.2023</td><td>4 дня</td></tr>
   <tr><td>2 Заказ</td><td>При вручении</td><td>В дороге</td><td>20.4.2023</td><td>1 дня</td></tr>
   <tr><td>3 Заказ</td><td>Оплачен</td><td>В сборе</td><td>23.4.2023</td><td>4 дня</td></tr>
   <tr><td>4 Заказ</td><td>Оплачен</td><td>В сборе</td><td>23.4.2023</td><td>4 дня</td></tr>

  </table>

        </div>
    </div>
</template>

<script >
    export default({

    })
</script>

<style lang='scss'>
.Profile{
 &Name{
    display: flex;
    justify-content: space-between;
    button{
        width: 150px;
        height: 40px;
        background: rgb(0, 140, 255);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 10px;
    }
 }
 &Tablee{
    margin-top: 5%;
display: flex;
justify-content: flex-start;
align-items: flex-start;

    table{
        border: 1px solid black;
        border-radius: 5px;
        width: 100%;
        @media screen and (max-width: 900px){
                    display: flex;
                    flex-direction: column;
                }
        th{
           padding: 2%;
           @media screen and (max-width: 900px){
                    display: flex;
                    flex-direction: column;
                }
        }
        tr{
            border: 1px solid black;
            @media screen and (max-width: 900px){
                    display: flex;
                    flex-direction: column;
                }
            td{
                @media screen and (max-width: 900px){
                    display: flex;
                    flex-direction: column;
                }
                padding: 1%;
                text-align: center;
            }
        }
    }
 }
}
</style>
