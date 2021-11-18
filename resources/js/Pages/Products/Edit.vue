<template>
    <top-bar></top-bar>
    <div class="d-flex ps-3 pt-3 justify-content-start">
        <div class="">
            <h3 class="box-title">Edit Product</h3>
        </div>
    </div>
    <div class="col-4 ps-3">
        <form @submit.prevent="update">
            <div class="form-group">
                <label for="title">SKU</label>
                <input type="text" class="form-control" name="sku" v-model="form.sku"/>
                <div v-if="errors.sku" class="text-danger">{{ errors.sku }}</div>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" v-model="form.title"/>
                <div v-if="errors.title" class="text-danger">{{ errors.title }}</div>
            </div>
            <div class="form-group">
                <label for="title">Quantity</label>
                <input type="number" min="1" class="form-control" name="quantity" v-model="form.quantity"/>
                <div v-if="errors.quantity" class="text-danger">{{ errors.quantity }}</div>
            </div>
            <div class="form-group">
                <label for="content">Description</label>
                <textarea id="content" name="description" class="form-control" v-model="form.description"></textarea>
                <div v-if="errors.description" class="text-danger">{{ errors.description }}</div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control" v-on:change="onFileChange">
                <div v-if="errors.image" class="text-danger">{{ errors.image }}</div>
                <img v-if="imageview" :src="imageview" class="mt-3" style="max-width: 50%">
            </div>
            <div class="col text-center mt-3">
                <inertia-link :href="$route('products.index')" as="button" class="btn btn-danger btn-block me-3">Cancel</inertia-link>
                <input type="submit" class="btn btn-success btn-block" value="Save" />
            </div>
        </form>
    </div>
</template>
<script>
import TopBar from "../Components/Topbar.vue";
export default {
    components: {
        TopBar
    },
    props: {
        errors: Object,
        product: Object
    },
    data(){
        return {
            imageview: '/uploads/' + this.product.image,
            form: this.$inertia.form({
                '_method': 'PUT',
                sku: this.product.sku,
                title: this.product.title,
                quantity: this.product.quantity,
                description: this.product.description,
                image: this.product.image,
            }),
        }
    },
    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            this.form.image = files[0];
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.imageview = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        update() {
            this.form.post(this.$route('products.update', this.product.id));
        },
    }
}
</script>