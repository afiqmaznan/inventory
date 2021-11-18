<template>
    <div class="container-register">
        <div class="box-register">
            <img src="/images/logo.png" class="rounded mx-auto d-block" style="max-width: 50%"/>
            <form method="post" @submit.prevent="register" class="mt-0">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="form.name" />
                    <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                </div>
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
                    <input type="submit" class="btn btn-primary btn-block" value="Register" />
                </div>
                <hr/>
                <div class="col text-center mt-3">
                    <p>Already have an account? <inertia-link :href="$route('login_form')" class="">Login</inertia-link></p>
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
                name: '',
                email: '',
                password: '',
            }),
        }
    },
    methods: {
        register() {
            this.form.post(this.$route('register'));
        },
    }
}
</script>