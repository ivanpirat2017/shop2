<template>
    <div class="cnt">
        <div class="p-t">
            <h3>Категория товаров</h3>
            <div class=" Categoris">
                <div class="Categorisblock" v-for="categor in categoris" :key="categor.id"
                    @click="$router.push('/categoris/' + categor.name + '/' + categor.id)">
                    <img :src="'/storage/' + categor.logo" alt="">
                    <h3>{{ categor.name }}</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getCategoris()
    },
    methods: {
        getCategoris() {
            fetch("api/get_categories").then(r => r.json()).then(r => {
                if (r.data) {
                    this.categoris = r.data
                }
            })
        }
    },
    data() {
        return {
            categoris: []
        }
    }
}
</script>

<style lang="scss">
.Categoris {


    display: flex;
    justify-content: start;
    flex-wrap: wrap;
    gap: 15px;

    &block {
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 2%;
        background: white;
        border-radius: 10px;
        cursor: pointer;

        img {
            width: 100%;
            border-radius: 10px;
        }
    }
}
</style>
