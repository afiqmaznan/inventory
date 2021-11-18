<template>
    <top-bar></top-bar>
    <div class="d-flex p-3 justify-content-end">
        <div class="">
            <inertia-link :href="$route('products.create')" class="btn btn-primary">+ Create New Product</inertia-link>
        </div>
    </div>
    <div class="col-12 p-3">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="">
                <tr>
                    <th class="text-center">SKU</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody v-if="this.products.length > 0">
                    <tr v-for="product in this.products" :key="product.id">
                        <td class="text-center align-middle">{{product.sku}}</td>
                        <td class="text-center align-middle">{{product.title}}</td>
                        <td class="text-center align-middle">{{product.quantity}}</td>
                        <td class="text-center align-middle">{{product.description}}</td>
                        <td class="text-center align-middle"><img :src="'uploads/'+product.image" alt="a" style="width:100px; height:auto;"></td>
                        <td class="text-center align-middle">
                            <inertia-link :href="$route('products.show', product.id)" class="btn btn-sm btn-primary ms-1">View</inertia-link>
                            <inertia-link :href="$route('products.edit', product.id)" class="btn btn-sm btn-warning ms-1">Edit</inertia-link>
                            <inertia-link @click="destroy(product.id)" class="btn btn-sm btn-danger ms-1">Delete</inertia-link>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="6" class="text-center align-middle"><h5 class="m-5">No products to show.</h5></td>
                    </tr>
                </tbody>
            </table>
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
        products: Object,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this from inventory?')) {
                this.$inertia.delete(this.$route('products.destroy', id))
            }
        },
    }
}
</script>