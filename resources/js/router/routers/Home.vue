<template>
  <div>
    <div class="laravel-vue">
      <div class="laravel-vue-logos">
        <img src="../../../static/img/laravel.png" width="240" alt="" />
        <img src="../../../static/img/vue.png" width="240" alt="" />
      </div>

      <div class="laravel-vue-title">
        <h1 class="vue">Vue 3</h1>
        <h1 class="plus">+</h1>
        <h1 class="vue">Vue Router 4</h1>
        <h1 class="plus">+</h1>
        <h1 class="vue">Vuex4</h1>
        <h1 class="plus">+</h1>
        <h1 class="laravel">Laravel 8</h1>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.vue{
    color: #3eaf7c;
}
.laravel{
    color: #eb4432;
}
.plus{
    color: #ff9408;
}
.laravel-vue {
  width: 100%;
  display: flex;
  flex-direction: column;
  height: 100vh;
  justify-content: center;
  align-items: center;
  &-title {
    display: flex;
    gap: 5px;
  }
}
</style>
