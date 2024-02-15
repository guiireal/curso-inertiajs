import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import Layout from "@/Pages/_Layouts/App.vue";
import AppHeader from "@/Components/AppHeader.vue";

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });

    const page = pages[`./Pages/${name}.vue`];

    page.default.layout = page.default.layout || Layout;

    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("AppHeader", AppHeader)
      .mount(el);
  },
  title: title => `${title} - App`,
});
