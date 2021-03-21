import App from "@app/components/App";
import { createApp } from "vue";
import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: '/:route(.*)',
        component: App
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({
    created() {
        console.log("Frontend Booted 🚀");
    },
}).use(router);

app.component("App", App);

const vm = app.mount("#app");
