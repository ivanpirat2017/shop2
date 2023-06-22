
<template>
    <div class="cnt p-t">
        <div class="registration">
            <div class="registrationItem background-black">
                <div class="registrationItemContent">
                    <h3>
                        Регистрация <span class="color-gray-f"> вашей учетной </span>
                        <span class="color-indigo"> записи</span>
                    </h3>

                    <div v-if="err.name != null">
                        <p class="color-red">{{ err.name[0] }}</p>
                    </div>
                    <div class="bgrd p-15-10">
                        <img src="../../../static/img/user.png" alt="" /><input type="text" placeholder="Имя" class=""
                            v-model="name" />
                    </div>
                    <div v-if="err.email != null">
                        <p class="color-red">{{ err.email[0] }}</p>
                    </div>
                    <div class="bgrd p-15-10">
                        <img src="" alt="" /><input type="text" class="" placeholder="Email" v-model="email" />
                    </div>
                    <div v-if="err.phon != null">
                        <p class="color-red">{{ err.phon[0] }}</p>
                    </div>
                    <div class="bgrd p-15-10">
                        <img src="../../../static/img/phone.png" alt="" /><input type="tel" v-model="phonemask" class=""
                            placeholder="Номер телефона" />
                    </div>
                    <div v-if="err.password != null">
                        <p class="color-red">{{ err.password[0] }}</p>
                    </div>
                    <div class="border-gray-f p-15-10">
                        <img src="../../../static/img/padlock.png" alt="" />
                        <input :type="inputPassword" v-model="password" placeholder="Пароль" />
                        <img :src="openEva" alt="" class="c-point" @click="passwordHidden = !passwordHidden" />
                    </div>
                    <div v-if="err.password2 != null">
                        <p class="color-red">{{ err.password2 }}</p>
                    </div>

                    <div class="border-gray-f p-15-10">
                        <img src="../../../static/img/padlock.png" alt="" /><input type="password"
                            placeholder="Повторите пароль" v-model="password2" />
                    </div>
                    <div class="registrationItemContentBtn p-15-0">
                        <button class="background-indigo" @click="reg()">
                            Зарегистрироваться
                        </button>
                        <router-link to="/login" class="color-oreng">Войти?</router-link>
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
            name: "",
            surname: "",
            adress: "",
            password: "",
            password2: "",
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
        reg() {
            if (this.password2 != this.password) {
                this.err.password2 = "пароли не совпадают";
                return;
            }

            const Form = new FormData();
            Form.append("name", this.name);
            Form.append("email", this.email);
            Form.append("phone", this.phone);
            Form.append("password", this.password);

            fetch('/api/register', {
                method: "POST",
                body: Form,
            }).then(r => {
                if (r.status == 200) {
                    return r.json()
                }
                return null
            })
                .then((r) => {
                    if (r) {
                        this.$router.push("/login");
                    }
                })
                .catch((err) => {
                    if (err.response) {
                        console.log(err.response.data.errors);
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
.registration {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    width: 100%;
    padding: 20px 0;

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
                    width: 300px;
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
