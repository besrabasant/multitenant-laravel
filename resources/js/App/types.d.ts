import lodash from "@types/lodash"
import {AxiosStatic} from "axios";
import Echo from 'laravel-echo';
import * as Turbo from '@hotwired/turbo';
import * as bootstrap from "bootstrap"

declare global {
    interface Window {
        _: lodash;
        axios: AxiosStatic;
        Echo: Echo
        Pusher: any,
        Turbo: Turbo,
        bootstrap: bootstrap,
    }
}
