<template>
  <div class="cnt p-t Worker p-t">
    <h3>Страница для работников IT центра</h3>
    <div class="WorkerBtn">
      <router-link to=""
        ><button class="background-indigo">Комментарии</button></router-link
      >
      <router-link to="/worker/orders"
        ><button class="background-indigo">Заказы</button></router-link
      >
       <router-link to="/worker/tovar"
        ><button class="background-indigo">Товар</button></router-link
      >
       <router-link to="/worker/content"
        ><button class="background-indigo">Категории</button></router-link
      >
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.Worker {
  &Btn {
    padding: 10px 0;
    button {
      margin: 5px;
    }
  }
}
</style>
