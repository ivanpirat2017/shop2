import { createRouter, createWebHistory } from "vue-router";
import Home from "./routers/Home.vue";
import Search from "./routers/Search.vue";
import About from "./routers/About.vue";
import NotFound from "./routers/NotFound.vue";
import Login from "./routers/Login.vue";
import Registration from "./routers/Registration.vue";
import Loader from "../components/Loader.vue";
import Categoris from "./routers/Categoris.vue";
import Profile from "./routers/Profile.vue";
import Cart from "./routers/Cart.vue";
import ProductPage from "./routers/ProductPage.vue";
import FilterCategoris from "./routers/FilterCategoris.vue";
export const AUTH_CHECK = "/api/authcheck";
export const AUTH_ADMIN_CHECK = "/api/authcheck";

export async function authCheck() {
    return await fetch(AUTH_CHECK, {
        method: "GET",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    }).then((r) => {
        return r;
    });
}
export async function authAdminCheck() {
    return await fetch(AUTH_ADMIN_CHECK, {
        method: "GET",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    }).then((r) => {
        return r;
    });
}
const routes = [
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: NotFound,
    },
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/search",
        name: "Search",
        component: Search,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/registration",
        name: "Registration",
        component: Registration,
    },
    {
        path: "/loader",
        name: "Loader",
        component: Loader,
    },
    {
        path: "/categoris",
        name: "Categoris",
        component: Categoris,
    },
    {
        path: "/profile",
        name: "Profile",
        component: Profile,
    },
    {
        path: "/cart",
        name: "Cart",
        component: Cart,
    },
    {
        path: "/product/:id",
        name: "ProductPage",
        component: ProductPage,
    },
    {
        path: "/categoris/:name/:id",
        name: "FilterCategoris",
        component: FilterCategoris,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach(async (to, from) => {
    if (to.meta.name == "admin") {
        return await authAdminCheck().then((r) => {
            if (r.status == 200) {
            } else {
                return "/";
            }
        });
    }
    if (to.fullPath == "/profile") {
        return await authCheck().then((r) => {
            if (r.status == 200) {
            } else {
                return "/login";
            }
        });
    }
    if (to.fullPath == "/login" || to.fullPath == "/registration") {
        return await authCheck().then((r) => {
            if (r.status == 200) {
                return "/profile";
            }
        });
    }

    window.scroll(0, 0);
});
export default router;
