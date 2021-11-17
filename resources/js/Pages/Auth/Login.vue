<template>
    <div class="container-register">
        <div class="box-register">
            <form method="post" @submit.prevent="submit" class="mt-0">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" v-model="form.email" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" v-model="form.password" />
                </div>
                <div class="col text-center mt-3">
                    <input type="submit" class="btn btn-primary btn-block" value="Login" />
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import {inject, reactive} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
export default {
    components: {
        
    },
    props: {
        errors: Object
    },
    setup() {
        const form = reactive({
            email: null,
            password: null,
            _token: usePage().props.value.csrf_token
        });
        const route = inject('$route');
        function submit() {
            Inertia.post(route('login'), form);
        }
        return {
            form, submit
        }
    }
}
</script>