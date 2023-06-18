<template>
<div class="popup">
    <div class="popupblur"></div>
    <div class="popupcontent background-gray-blue">
      <div class="popupcontenttitle">
        <h3>{{title}}</h3>
      </div>
      <hr />
      <div class="popupcontenttext">
          <p>{{text}}</p>
      </div>
      <hr />
      <div class="popupcontentbtns">
        <button class="background-grean" @click="funbtn()">{{namebtn}}</button>
        <button class="background-oreng" @click="clickclose()">Отменить</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ["clickclose",'title','text','namebtn','funbtn',],
}
</script>

<style lang="scss">
.popup {
  top: 0;
  left: 0;
  position: fixed;
  width: 100vw;
  height: 100vh;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  &blur {
    position: absolute;
    width: 100%;
    height: 100%;
    filter: invert(1);
  }
  &content {
    overflow: hidden;
    cursor: pointer;
    border-radius: 10px;
    width: 600px;

    z-index: 3;
    box-shadow: black 0 0 100px;
      display: flex;
  flex-direction: column;
  justify-content: space-between;
  div{
      padding: 20px ;
       display: flex;
       gap: 10px;
  }

  }
}
</style>
