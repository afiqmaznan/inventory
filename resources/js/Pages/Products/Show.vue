<template>
    <top-bar></top-bar>
    <div class="d-flex ps-3 pt-3 justify-content-start">
        <div class="">
            <h3 class="box-title">Product Details</h3>
        </div>
    </div>
    <div class="col-6 ps-3">
        <table class="table table-borderless">
            <tbody class="">
                <tr>
                    <th class="text-right">SKU</th><td class="text-left align-middle">{{product.sku}}</td>
                </tr>
                <tr>
                    <th class="text-right">Title</th><td class="text-left align-middle">{{product.title}}</td>
                </tr>
                <tr>
                    <th class="text-right">Quantity</th><td class="text-left align-middle">{{product.quantity}}</td>
                </tr>
                <tr>
                    <th class="text-right">Description</th><td class="text-left align-middle">{{product.description}}</td>
                </tr>
                <tr>
                    <th class="text-right">Image</th><td class="text-left align-middle"><img :src="imageview" style="width:200px; height:auto;"></td>
                </tr>
            </tbody>
        </table>
        <div class="col text-center mt-3">
            <inertia-link :href="$route('products.index')" as="button" class="btn btn-danger btn-block me-3">Back</inertia-link>
        </div>
    </div>
</template>
<script>
import TopBar from "../Components/Topbar.vue";
export default {
    components: {
        TopBar
    },
    props: {
        product: Object
    },
    data(){
        return {
            imageview: '/uploads/' + this.product.image,
        }
    },
    methods: {

    }
}
</script>