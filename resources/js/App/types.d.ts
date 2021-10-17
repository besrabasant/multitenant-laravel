import * as Turbo from '@hotwired/turbo';
import * as bootstrap from "bootstrap"

declare global {
    interface Window {
        Turbo: Turbo,
        bootstrap: bootstrap,
    }
}
