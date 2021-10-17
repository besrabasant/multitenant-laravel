<template>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
        <Link :href="route('dashboard')"
              class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <jet-application-mark width="36"/>
            <span class="ms-4 fw-bold h5 mb-0">
                {{ $page.props.app.name }}
            </span>
        </Link>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <JetNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                Dashboard
            </JetNavLink>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <img v-if="$page.props.jetstream.managesProfilePhotos" class="rounded-circle" width="32" height="32"
                     :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name"/>
                <span class="ms-2">
                        <strong>{{ $page.props.user.name }}</strong>
                    </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                aria-labelledby="dropdownUser">
                <li>
                    <h6 class="dropdown-header small text-muted">
                        Manage Account
                    </h6>
                </li>
                <li>
                    <JetDropdownLink :href="route('profile.show')">Profile</JetDropdownLink>
                </li>
                <li v-if="$page.props.jetstream.hasApiFeatures">
                    <JetDropdownLink :href="route('api-tokens.index')">API Tokens</JetDropdownLink>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form @submit.prevent="logout">
                        <JetDropdownLink as="button">
                            Log out
                        </JetDropdownLink>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {defineComponent} from "vue";
import {Link} from '@inertiajs/inertia-vue3'
import JetApplicationMark from "@/Main/Jetstream/ApplicationMark";
import JetDropdownLink from "@/Main/Jetstream/DropdownLink";
import JetNavLink from "@/Main/Jetstream/NavLink";

export default defineComponent({
    name: "Sidebar",
    components: {
        Link,
        JetApplicationMark,
        JetDropdownLink,
        JetNavLink
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
})
</script>

<style scoped>

</style>
