<template>
    <div>
        <Head :title="title"/>

        <div>

        </div>

        <div>
            <jet-banner/>

            <Navbar/>

            <!-- Page Heading -->
            <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                <div class="container-fluid">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main class="container-fluid my-5">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import {Head} from '@inertiajs/inertia-vue3'
import JetBanner from '@/Jetstream/Banner.vue'
import Navbar from "@/Partials/Navbar";


// TODO: Add Sidebar layout

export default {
    props: {
        title: String,
    },

    components: {
        Head,
        JetBanner,
        Navbar
    },
}
</script>
