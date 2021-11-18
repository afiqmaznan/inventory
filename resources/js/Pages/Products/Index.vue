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
}
</script>