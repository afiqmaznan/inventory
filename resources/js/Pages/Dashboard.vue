<template>
    <top-bar></top-bar>
    <div class="row m-3">
        <!-- User -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 mb-1">My Account</div>
                            <div class="text-xs font-weight-bold" v-if="user">{{user.name}}</div>
                            <div class="text-xs font-weight-bold" v-if="user">{{user.email}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 mb-1">Total Products in Inventory</div>
                            <div class="text-xs font-weight-bold">{{this.productCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-dolly-flatbed fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 mb-1">Total Registered Users</div>
                            <div class="text-xs font-weight-bold">{{this.userCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>
<script>
import TopBar from "./Components/Topbar.vue";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import NProgress from 'nprogress';
export default {
    components: {
        TopBar
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        }
    },
    data() {
        return {
            productCount: 0,
            userCount: 0,
        }
    },
    beforeMount(){
        this.countProducts();
        this.countUsers();
    },
    methods: {
        countProducts() {
            NProgress.start();
            axios.get('/count/products')
                .then(response => {
                    NProgress.done();
                    this.productCount = response.data;
                }).catch(err=>{
                    NProgress.done();
                    console.log(err);
                });
        },
        countUsers() {
            NProgress.start();
            axios.get('/count/users')
                .then(response => {
                    NProgress.done();
                    this.userCount = response.data;
                }).catch(err=>{
                    NProgress.done();
                    console.log(err);
                });
        }
    }
}
</script>