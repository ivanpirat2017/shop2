
<template>
<div class="Register">
    <div class="reg">
    <h1>Регистрация</h1>
    <div class="reginput">
        <input placeholder="Name" type="text">
        <input placeholder="Email" type="text">
        <input placeholder="Password" type="text">
    </div>
    <button>Создать</button>
</div>
</div>
</template>

<script >
    export default ({

    })
</script>

<style lang='scss'>
.Register{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 90vh;
}
.reg{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 30%;
    padding: 5%;
    box-shadow: 7px 9px 8px 0px rgba(34, 60, 80, 0.2);
    &input{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        input{
            width: 40%;
            padding: 3%;
            margin: 3%;
            background: rgba(204, 204, 204, 0.479);
            border: 2px solid black;
            border: none;
        }
    }
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
</style>
