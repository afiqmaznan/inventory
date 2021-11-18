<template>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="/images/logo.png"  height="40" alt="">
            </a>
            <div class="collapse navbar-collapse text-center" id="navbarCollapse">
                <div class="navbar-nav">
                    <inertia-link :href="$route('dashboard')" 
                        :class="activeClass('')" 
                        class="nav-item nav-link "
                        >Dashboard
                    </inertia-link>
                    <inertia-link :href="$route('products.index')" 
                        :class="activeClass('products')" 
                        class="nav-item nav-link "
                        >Products
                    </inertia-link>
                    
                </div>
                <div class="navbar-nav ms-auto">
                    <inertia-link :href="$route('logout')" as="button" method="post" class="nav-item nav-link btn bg-transparent btn-outline-transparent" >Logout</inertia-link>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    components: {
        
    },
    props: {
        errors: Object
    },
    data () {
        return {
            currentLink: location.href,
        }
    },
    computed: {
        routes() {
            return window.routes
        },
    },
    mounted() {
        this.setCurrentLink()
    },
    methods: {
        route(url) {
            return this.routes.route(url);
        },
        activeClass(segment) {
            return segment == this.currentLink ? 'active' : '';
        },
        setCurrentLink() {
            this.currentLink = new URL(location.href).pathname.split('/').pop();
        }
    }
}
</script>