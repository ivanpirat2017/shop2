<template>
    <div class="cnt p-t">
        <div class="Login">
            <div class="LoginItem background-black">
                <div class="LoginItemContent">
                    <h3>
                        Авторизация <span class="color-gray-f"> вашей учетной </span>
                        <span class="color-indigo"> записи</span>
                    </h3>
                    <div v-if="err.phone != null">
                        <p class="color-red">{{ err.phone[0] }}</p>
                    </div>
                    <div class="p-15-10 bgrd">
                        <img src="../../../static/img/phone.png" alt="" /><input type="tel" class="" v-model="phonemask"
                            placeholder="Номер телефона" />
                    </div>
                    <div v-if="err.password != null">
                        <p class="color-red">{{ err.password[0] }}</p>
                    </div>
                    <div class="border-gray-f p-15-10">
                        <img src="../../../static/img/padlock.png" alt="" />
                        <input :type="inputPassword" v-model="password" placeholder="Пароль" />
                        <img :src="openEva" alt="" @click="passwordHidden = !passwordHidden" />
                    </div>

                    <div class="LoginItemContentBtn p-15-0">
                        <button class="background-indigo" @click="login()">Войти</button>
                        <router-link to="/registration" class="color-oreng">Зарегистрироваться?</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Eva from "../../../static/img/view.png";
import EvaClose from "../../../static/img/eye-close.png";
import { mask } from "../../script/mask";
export default {
    data() {
        return {
            passwordHidden: true,
            phone: "",
            phonemask: "",
            password: "",
            err: {},
        };
    },
    watch: {
        phonemask() {
            const maskData = mask("+x (xxx) xxx-xx-xx", this.phonemask);
            this.phonemask = maskData.text;
            this.phone = maskData.numder;
        },
    },
    methods: {
        login() {
            const Form = new FormData();
            Form.append("login", this.phone);
            Form.append("password", this.password);
            console.log(this.phone)
            fetch('/api/login', {
                method: "POST",
                body: Form,
            }).then(r => r.json()).then((r) => {
                localStorage.setItem("token", r.token);
                this.$router.push("/profile");
            }).catch((err) => {
                if (err.response) {
                    this.err = err.response.data.errors;
                }
            });
        },
    },
    computed: {
        openEva() {
            if (this.passwordHidden) {
                return Eva;
            }
            return EvaClose;
        },

        inputPassword() {
            if (this.passwordHidden) {
                return "password";
            }
            return "text";
        },
    },
}
</script>

<style lang="scss">
.Login {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    width: 100%;

    &Item {
        max-width: 600px;
        padding: 50px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;

        @media (max-width: 700px) {
            max-width: 400px;
            padding: 20px;
        }

        @media (max-width: 450px) {
            max-width: 350px;
            padding: 10px;
        }

        &Content {
            display: flex;
            flex-direction: column;

            h3 {
                padding: 20px 0;
            }

            &Btn {
                display: flex;
                justify-content: space-between;
                align-items: center;

                @media (max-width: 700px) {
                    flex-direction: column;
                    align-items: flex-start;
                }

                a {
                    font-size: 1em;

                    @media (max-width: 700px) {
                        padding-top: 15px;
                    }
                }

                button {
                    padding: 15px;
                    width: 200px;
                    border-radius: 5px;
                }
            }

            .p-15-0 {
                padding: 15px 0x;
            }

            .p-15-10 {
                padding: 15px 10px;
            }

            div {
                margin: 15px 0;
                border-radius: 20px;

                display: flex;

                input {
                    font-size: 1.2em;
                }

                img {
                    &:nth-child(3) {
                        cursor: pointer;
                    }

                    height: 30px;
                    object-fit: cover;
                    filter: invert(0.5);
                    padding-right: 10px;
                }
            }
        }
    }
}
</style>
