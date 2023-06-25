<template>
    <div class="">
        <div class="AdminEditCartitem">
            <h4 v-if="!id_type">Создание категории</h4>
            <h4 v-else>Создать карточку</h4>
            <h5>название</h5>
            <input type="text" v-model="name" />

            <input type="file" id="fileCategoris" />
            <button class="background-grean" @click="AppCater()">
                Создать
            </button>
        </div>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    data() {
        return {
            name: "",
            err: {}
        }
    },
    methods: {
        async AppCater() {
            const file = await document.querySelector("#fileCategoris");
            const Form = new FormData();
            Form.append("name", this.name);
            Form.append("logo", file.files[0]);
            fetch("/api/add_categories", {
                method: "POST",
                body: Form,
                headers: {
                    Accept: "multipart/form-data",
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
            }).then(r => {
                if (r.status == 204) {
                    toast.success("Категория добавлена успешно !", {
                        autoClose: 4000,
                    });

                    return r.json()
                }
                return null
            }).catch((err) => {
                if (err.response) {

                }
            })
        }
    }
}
</script>

<style lang="scss">
.AdminEditCart {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    display: flex;
    align-items: flex-start;
    overflow: hidden;
    z-index: 4;

    &item {
        width: 100%;
        min-width: 300px;
        box-shadow: rgba(255, 255, 255, 0.185) 0 0 100px;
        display: flex;
        flex-direction: column;

        padding: 15px;
        border-radius: 10px;
        min-height: 200px;
        position: relative;

        button {
            margin-bottom: 20px;
        }

        &Edittext {
            width: 90%;
            min-height: 50px;
            padding: 5px;
            border-radius: 10px;
            margin: 15px 0;
            border: gray 2px solid;
            outline: none;
        }

        &Close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px;
            height: 20px;
            width: 20px;
            border-radius: 100%;
            background: rgb(59, 59, 59);
            font-weight: 700;
            font-size: 1.4em;
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: red;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 15px 0;
            border: gray 2px solid;
        }
    }
}
</style>
