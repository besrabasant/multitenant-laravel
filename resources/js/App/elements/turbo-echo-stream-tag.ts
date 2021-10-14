import Echo from 'laravel-echo';
import {connectStreamSource, disconnectStreamSource} from '@hotwired/turbo'
import Pusher, {PresenceChannel} from "pusher-js"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: process.env.MIX_PUSHER_APP_USE_SSL === "true",
    disableStats: true,
    wsHost: process.env.MIX_PUSHER_APP_HOST,
    wsPort: process.env.MIX_PUSHER_APP_PORT || null,
});

document.addEventListener('turbo:before-fetch-request', (e: Event & any) => {
    e.detail.fetchOptions.headers['X-Socket-ID'] = window.Echo.socketId();
});

window.Pusher = Pusher;

const subscribeTo = (type, channel) => {
    if (type === "presence") {
        return window.Echo.join(channel)
    }

    return window.Echo[type](channel)
}


class TurboEchoStreamSourceElement extends HTMLElement {
    private _channel: string = "";
    public subscription: PresenceChannel | null = null

    async connectedCallback() {
        connectStreamSource(this)
        this.subscription = subscribeTo(this.type, this.channel)
            .listen('.Tonysm\\TurboLaravel\\Events\\TurboStreamBroadcast', (e) => {
                this.dispatchMessageEvent(e.message)
            })
    }

    disconnectedCallback() {
        disconnectStreamSource(this)
        if (this.subscription) {
            window.Echo.leave(this.channel)
            this.subscription = null
        }
    }

    dispatchMessageEvent(data) {
        const event = new MessageEvent("message", {data})
        return this.dispatchEvent(event)
    }

    get channel(): string {
        return <string>this.getAttribute("channel")
    }

    get type(): string {
        return this.getAttribute("type") || "private"
    }
}

customElements.define("turbo-echo-stream-source", TurboEchoStreamSourceElement)
