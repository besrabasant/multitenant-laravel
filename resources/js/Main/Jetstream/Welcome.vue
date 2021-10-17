<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <div class="mx-3 my-3">
                        <h3 class="h3 my-4 fw-bold">
                            Create your application
                        </h3>

                        <Link :href="route('application.create')" class="btn btn-lg btn-primary text-white">
                            Create
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Link
    },
})
</script>
