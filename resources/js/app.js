import {createApp, h} from 'vue';
import '../css/app.css';
import {createInertiaApp, Head} from '@inertiajs/inertia-vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {InertiaProgress} from '@inertiajs/progress'
import App from "./Pages/Layout/App.vue";

InertiaProgress.init()

createInertiaApp({
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );

        page.then((module) => {
            if (module.default.layout === undefined) {
                module.default.layout = App;
            }
        });
        return page
    },
    setup({ el, App, props, plugin }) {
       const app = createApp({ render: () => h(App, props) })
            .mixin({methods: {route}})
            .use(plugin)
            .component('Head', Head)
            .mount(el)
    },
    title: (title) => `My app - ${title}`
});
