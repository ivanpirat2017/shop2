<template>
  <div class="AdminWorkerOrder">
        <h4>Заказы</h4>
        <h5  >Поиск</h5>
        <div class="AdminWorkerOrderWrite">
          <input
            type="text"
            class="border-gray"
            placeholder="Что хотите найти ?"
            v-model="search"
          />
        </div>
        <select class="color-white background-100" v-model="statusCode">
          <option value="1">создан</option>
          <option value="2">обработан</option>
          <option value="3">ожидайте мастера</option>
          <option value="4">мастер выехал</option>
          <option value="5">заказ выполнен</option>
          <option value="6">заказ отменен</option>
          <option value="7">заберите заказ</option>
        </select>
        <h5 class="color-grean">Ура Заказов нет</h5>
        <div class="AdminWorkerOrderCart">

        </div>
      </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
