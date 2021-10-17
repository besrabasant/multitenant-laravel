import type {Plugin} from "vue";
import type {InertiaApp, InertiaAppProps} from "@inertiajs/inertia-vue3";

declare module "*.vue" {
    import { defineComponent } from 'vue';
    const component: ReturnType<typeof defineComponent>;
    export default component;
}


declare global {
    let route: any;

    interface Window {
        route: any
    }
}

interface InertiaSetupProps {
    el: Element
    app: InertiaApp
    props: InertiaAppProps
    plugin: Plugin
}
