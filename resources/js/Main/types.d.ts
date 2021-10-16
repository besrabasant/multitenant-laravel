import {Plugin} from "vue";
import {InertiaApp, InertiaAppProps} from "@inertiajs/inertia-vue3";

declare module '*.vue' {
    import Vue from 'vue'
    export default Vue
}

declare global {
    var route: any;

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
