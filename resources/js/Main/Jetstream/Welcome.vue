<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <div class="mx-3 my-3">
                        <h3 class="h3 my-4 fw-bold">
                            Welcome to the Dashboard
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import JetApplicationLogo from '@/Main/Jetstream/ApplicationLogo.vue'

export default defineComponent({
    components: {
        JetApplicationLogo,
    },
})
</script>
