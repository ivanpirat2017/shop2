<template>
  <div class="p-t cnt">
        <div class="Search">
            <h2>Поиск</h2>
            <div class="SearchInput border-gray">
                <input type="text" @keyup.enter="searchClick()" class="" v-model="search"
                    placeholder="Что хотите найти?" />
                <img src="../../../static/img/search.png" alt="" @click="searchClick()" />
            </div>
            <h5 ></h5>
            <h5 >По вашему запросу ничего не нашлось 1</h5>
            <h5 >Товар</h5>
            <div class="Serviceoption">
                <Option v-for="option in Options" :option="option" :addsearch="true" :item="option" :key="option.id" />
            </div>
        </div>
    </div>
</template>

<script>

export default {

}
</script>

<style lang="scss">
.Search {
    h2 {
        margin: 20px 0 10px 0;
    }

    h5 {
        margin: 20px 0 10px 0;
    }

    &Input {
        display: flex;
        height: 40px;
        gap: 15px;
        padding: 10px;
        border-radius: 10px;
        input {
            padding: 0;
            height: 100%;
        }
        img {
            cursor: pointer;
            transition: 0.2s;
            &:hover {
                transform: scale(1.1);
            }
        }
    }
}
</style>
