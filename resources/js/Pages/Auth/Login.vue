<template>
    <div class="container-register">
        <div class="box-register">
            <img src="/images/logo.png" class="rounded mx-auto d-block" style="max-width: 50%"/>
            <form method="post" @submit.prevent="login" class="mt-0">
                <div v-if="errors.error_login" class="text-danger">{{ errors.error_login }}</div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" v-model="form.email" />
                    <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" v-model="form.password" />
                    <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>
                </div>
                <div class="col text-center mt-3">
                    <input type="submit" class="btn btn-primary btn-block" value="Login" />
                </div>
                <hr/>
                <div class="col text-center mt-3">
                    <p>Don't have an account? <inertia-link :href="$route('register_form')" class="">Register Now</inertia-link></p>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    components: {
        
    },
    props: {
        errors: Object
    },
    data(){
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
            }),
        }
    },
    methods: {
        login() {
            this.form.post(this.$route('login'));
        },
    }
}
</script>