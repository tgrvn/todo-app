import { createApp, h } from "vue";
import { Link, createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.es';
import Main from "./Layouts/Main.vue";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        if (page.default.layout === undefined) page.default.layout = Main;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Link", Link)
            .mount(el);
    },
    title: (title) => "Todo App - " + title,
});
