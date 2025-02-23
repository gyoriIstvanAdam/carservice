import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createPinia} from "pinia";
import {createInertiaApp, Head, Link} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import {i18nVue} from 'laravel-vue-i18n'
import globalComponents from "@/Global-components";
import Utils from "@/Utils";
import '../css/paginator.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({el, App, props, plugin}) {
    const appos = createApp({render: () => h(App, props)})
        .use(plugin)
        .use(ZiggyVue, Ziggy)
        .use(i18nVue, {
          // resolve: (lang) => import(`../../lang/${lang}.json`),
          resolve: async lang => {
            const langs = import.meta.glob('../../lang/*.json');
            return await langs[`../../lang/${lang}.json`]();
          }
        })
        .component('Head', Head)
        .component('Link', Link)
        .component('InertiaLink', Link)
        .component('InertiaHead', Head)
        .use(createPinia())
      globalComponents(appos)
      Utils(appos);

    return appos.mount(el);
  },
  title: (title) => `${title} - ${appName}`,
  progress: {
    color: '#4B5563',
  },
});
