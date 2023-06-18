<template>
<div class="fx">
    <div class="serach-box" @click="boxMneu = !boxMneu" :class="{
            'serach-box-close': !boxMneu,
            'serach-box-open': boxMneu,
        }">
            <div class="serach-boxitem"></div>
            <div class="serach-boxitem"></div>
            <div class="serach-boxitem"></div>
        </div>
        <div class="menu background-black" :class="{ 'menu-close': boxMneu }">
            <div class="menulogo">
                <router-link @click="boxMneu = !boxMneu" to="/">
                    <p class="c-gf P-hover-ing">KurskSam </p>
                </router-link>
            </div>
            <div class="menucontent">
                <router-link @click="boxMneu = !boxMneu" to="/" class="d-home-none ">
                    <p class="c-gf P-hover-ing">Главная </p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/search">
                    <p class="c-gf P-hover-ing">Поиск</p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/about">
                    <p class="c-gf P-hover-ing">О нас</p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/categoris">
                    <p class="c-gf P-hover-ing">Категории</p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/profile">
                    <p class="c-gf P-hover-ing">Профиль</p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/cart">
                    <p class="c-gf P-hover-ing">Корзина</p>
                </router-link>
                <router-link @click="boxMneu = !boxMneu" to="/">
                    <p class="c-gf P-hover-ing">Доставка</p>
                </router-link>
                <img height="30" @click="$router.push('/'); "
                    src="../../static/img/software-engineer.png" />
                <img @click="light()" v-if="day" height="30" src="../../static/img/sun.png" />
                <img @click="dark()" v-else height="30" src="../../static/img/moon.png" />
            </div>
        </div>
</div>

</template>

<script>
import "../../static/img/search.png";
export default {
    data() {
        return {
            searchhover: false,
            boxMneu: true,
            search: "",
            day: true,
        };
    },
    methods:{
        light() {
            function changeCSS(cssFile, cssLinkIndex) {
                var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);
                var newlink = document.createElement("link");
                newlink.setAttribute("rel", "stylesheet");
                newlink.setAttribute("type", "text/css");
                newlink.setAttribute("href", cssFile);
                document
                    .getElementsByTagName("head")
                    .item(0)
                    .replaceChild(newlink, oldlink);
            }
            changeCSS("/css/light.css", 1);
            this.day = false;
        },
        dark() {
            function changeCSS(cssFile, cssLinkIndex) {
                var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);
                var newlink = document.createElement("link");
                newlink.setAttribute("rel", "stylesheet");
                newlink.setAttribute("type", "text/css");
                newlink.setAttribute("href", cssFile);

                document
                    .getElementsByTagName("head")
                    .item(0)
                    .replaceChild(newlink, oldlink);
            }
            changeCSS("/css/dark.css", 1);
            this.day = true;
        },
        searchhoverbool(boolcnt) {
            this.searchhover = boolcnt;
        },
    },
};
</script>

<style lang="scss">
.cartboxinfo {
    width: 15px;
    height: 15px;
    right: -10px;
    position: absolute;
    background-clip: content-box;
    border-radius: 100%;
    top: 0;

    &::after {
        content: "";
        width: 5px;
        height: 5px;
        position: absolute;

        border: transparent 3px solid;
    }
}

.fx {
    position: fixed;
    width: 100vw;
    height: 100vh;
    z-index: 7;
    pointer-events: none;
    top: 0;
    left: 0;
}

.d-home-none {


    @media (min-width: 1200px) {
        display: none;
    }
}

.serach-box {
    @media (min-width: 1200px) {
        display: none;
    }

    width: 50px;
    height: 50px;
    right: 0;
    top: 0;
    pointer-events: all;
    margin: 10px;
    position: absolute;
    cursor: pointer;
    z-index: 12;
    display: flex;
    transition: 0.5s;
    flex-direction: column;
    justify-content: space-between;

    &item {
        width: 50px;
        height: 7px;
        transition: 0.5s;
    }
}

.serach-box-close {
    div {
        $color: #e74c3c;
        background: $color;
        box-shadow: rgba(0, 0, 0, 0.37) 0 0 12px;

        &:nth-child(1) {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(135deg);
        }

        &:nth-child(2) {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%) rotate(90deg);
        }

        &:nth-child(3) {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(-135deg);
        }
    }
}

.serach-box-open {
    div {
        $color: #a74feb;
        background: $color;
        box-shadow: black 0 0 12px;

        &:nth-child(1) {
            position: absolute;
            top: 0;
            left: 50%;
            opacity: 1;
            transform: translateX(-50%) rotate(0);
        }

        &:nth-child(2) {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(0);
        }

        &:nth-child(3) {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-100%) rotate(0);
        }
    }
}

.menu-close {
    @media (max-width: 1200px) {
        transform: translateX(-100%);
    }
}

.menu {
    pointer-events: all;
    z-index: 10;
    padding: 10px 15vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.204) 0 0 40px 0;
    height: 60px;

    @media (max-width: 1200px) {
        position: absolute;
        box-shadow: none;
        top: 0;
        left: 0;
        min-width: 300px;
        height: 100vh;
        flex-direction: column;
        align-items: flex-start;
        justify-content: start;
    }

    &logo {
        display: flex;
        align-items: center;

        a {
            p {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 1200px) {
            display: none;
        }

        h5 {
            color: white;
        }

        img {
            height: 50px;
        }
    }

    &search-w {
        width: 400px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;

        @media (max-width: 1400px) {
            width: 270px;
        }

        @media (max-width: 1200px) {
            align-items: flex-start;
            justify-content: start;

            padding: 20px 0;
        }
    }

    &search {
        display: flex;
        transition: 0.4s;
        width: 300px;
        max-width: 500px;
        padding: 5px;
        border: #6e329b 2px solid;
        border-radius: 5px;

        input {
            padding: 0;
            transition: 0.4s;
        }

        img {
            height: 30px;
            cursor: pointer;
        }
    }

    &content {
        display: flex;
        align-items: center;
        gap: 20px;

        img {
            cursor: pointer;
        }

        @media (max-width: 1200px) {
            flex-direction: column;
            align-items: flex-start;
            justify-content: start;
            padding-top: 100px;
        }

        a {
            p {
                transition: 0.2s;
                position: relative;
                border-bottom: #8e62cf00 solid 2px;
            }
        }
    }
}

.d-none {
    width: 0;
    padding: 0;
}

.search-m-action {
    margin-right: 10px;
}

.w-44 {
    width: 44px-15;
    border: #4c008200 2px solid;
}
</style>
