import "./bootstrap";
import "../css/app.css";
import Vue3Toastify from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import { createNotivue } from "notivue";
import "notivue/notification.css"; // Only needed if using built-in notifications
import "notivue/animations.css"; // Only needed if using built-in animations
import "notivue/notification-progress.css";

import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import MainLayout from "@/Layouts/MainLayout.vue";

const notivue = createNotivue({
    limit: 1,
    avoidDuplicates: true,
    notifications: {
        global: {
            duration: 3000,
        },
    },
});
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        if (!page.default.layout) {
            page.default.layout = MainLayout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Vue3Toastify, {
                position: "top-center",
                autoClose: 2000,
                closeButton: false,
            })
            .use(notivue)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#7152F3",
    },
});
