import lodash from "@types/lodash"
import {AxiosStatic} from "axios";
import Echo from 'laravel-echo';
import * as bootstrap from "bootstrap"

declare global {
    interface Window {
        bootstrap: bootstrap;
        _: lodash;
        axios: AxiosStatic;
        Echo: Echo;
        Pusher: any;
    }
}
