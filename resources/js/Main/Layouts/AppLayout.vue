<template>
    <div class="d-flex ">
        <Head :title="title"/>

        <Sidebar/>

        <div class="flex-grow-1 flex-shrink-1 overflow-auto" style="height: 100vh; padding-top: 85px;">

            <JetBanner/>
            <!--            <Navbar/>-->

            <!-- Page Heading -->
            <header class="d-flex py-3 bg-white shadow-sm border-bottom fixed-top" style="left: 280px;">
                <div class="container-fluid px-4">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main class="container-fluid my-3 px-4">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import JetBanner from '@/Main/Jetstream/Banner.vue'
import Navbar from "@/Main/Partials/Navbar";
import Sidebar from "@/Main/Partials/Sidebar";

// TODO: Add Sidebar layout

export default {
    props: {
        title: String,
    },

    components: {
        Head,
        Link,
        JetBanner,
        Navbar,
        Sidebar,
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(route('current-team.update'), {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },

        logout() {
            this.$inertia.post(route('logout'));
        },
    },

    computed: {
        path() {
            return window.location.pathname
        }
    }
}
</script>
