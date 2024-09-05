import './bootstrap';
import '../css/app.css';
import Vue3Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { createNotivue } from 'notivue'
import 'notivue/notification.css' // Only needed if using built-in notifications
import 'notivue/animations.css' // Only needed if using built-in animations


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const notivue = createNotivue({
    limit: 1
});
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Vue3Toastify, {
                position: 'top-center',
                autoClose: 2000,
                closeButton: false
            })
            .use(notivue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },

});
