<template>
<Menu/>
<main>
    <router-view></router-view>
</main>
<Footer/>
</template>

<script>
import Menu from "./components/Menu.vue";
import Footer from "./components/Footer.vue";
export default {
    components: {
    Menu,
    Footer,
  },
}
</script>

<style>

</style>
