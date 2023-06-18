<template>
  <footer class="background-black mt-40">
    <div class="cnt footer">
      <h3 class="pt-20">Наши Контакты</h3>
      <div class="footercontent">
        <div class="footercontentinfo">
          <p>+7 (4712) 55-06-06</p>
          <p>Kursksam@Kursksam.com</p>
          <a href="https://vk.com">
            <img height="25" src="../../static/img/vk.png" alt="" />
            <p>Группа в ВК</p></a
          >
        </div>
        <div class="footercontentimg">
          <img src="../../static/img/logo.png" alt="" />
        </div>
        <div class="footercontentadress">
          <p>
            307200, Россия, Курская обл., Октябрьский р-н., п. Прямицыно, ул.
            Октябрьская, д.193
          </p>
          <p>
            307240, Россия, Курская обл., Курчатовский р-н., п. Карла Либкнехта,
            ул. Пушкина, д.5Б
          </p>
        </div>
      </div>
      <h5 class="footer-it">
        <span class="color-indigo">S</span>am<span class="color-red">K</span
        >ursk ©2023
      </h5>
    </div>
  </footer>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.footer {
  &-it {
    border-top: #1e1e20 3px solid;
    padding: 30px 0 50px 0;
    margin-top: 10px;
    text-align: center;
    width: 100%;
    @media (max-width: 1400px) {
      font-size: 2em;
    }
  }
  &content {
    display: flex;
    justify-content: space-between;
    align-items: center;

    @media (max-width: 1200px) {
      flex-direction: column;
    }
    &img {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      img {
        height: 50px;
        @media (max-width: 1200px) {
          display: none;
        }
      }
    }
    div {
      width: 30%;
      padding: 10px 0;
      @media (max-width: 1200px) {
        width: 100%;
      }
      P {
        font-size: 1em;
        padding: 5px 0;
      }
      a {
        font-size: 1em;
        display: flex;
        align-items: center;
      }
    }
  }
}
</style>
