import {InertiaSetupProps} from "@/Main/types";

import('@/Shared/bootstrap');
import('@/Main/bootstrap');

// Import modules...
import {App, ComponentPublicInstance, createApp, h} from 'vue';
import {createInertiaApp, InertiaAppProps} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title: string) => `${title} - ${appName}`,
    resolve: (name: string) => require(`./Pages/${name}.vue`),
    setup({el, app, props, plugin}: InertiaSetupProps): App<Element> {
        return <App<Element>><unknown>createApp({render: () => h(app, props)})
            .use(plugin)
            .mixin({methods: {route}} as any)
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
