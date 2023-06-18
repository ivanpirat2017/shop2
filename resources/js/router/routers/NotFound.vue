<template>
    <div class="notFound">
      <div class="notFoundCnt">
        <h2 class="color-blue">404</h2>
        <img :src="botImg" alt="" />
      </div>
      <h5 class="color-gray-f">
        Извините, нам не удалось найти эту страницу. Но не стоит беспокоиться. ВСЁ У
        НАС ПРЕКРАСНО!
      </h5>
      <router-link to='/'><button class="background-indigo ">Переход на главную страницу</button></router-link>
    </div>
  </template>
  <script>
  import bot from "../../../static/img/bot.png";
  export default {
    data() {
      return {
        botImg: bot,
      };
    },
  };
  </script>
  <style lang="scss">
  .notFound {

    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    padding: 50px;
    h5{
          @media (max-width: 800px) {
        font-size: 1.3rem;
      }
      @media (max-width: 500px) {
         font-size: 1rem;
      }
    }
    &Cnt {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
    }
    img {
      height: 200px;
      @media (max-width: 800px) {
        height: 100px;
      }
      @media (max-width: 400px) {
        height: 50px;
      }
    }
    h2 {
      font-size: 12rem;
      @media (max-width: 800px) {
        font-size: 8rem;
      }
      @media (max-width: 400px) {
         font-size: 4rem;
      }
    }
  }
  </style>
