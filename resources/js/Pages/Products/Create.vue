<template>
    <top-bar></top-bar>
    <div class="d-flex ps-3 pt-3 justify-content-start">
        <div class="">
            <h3 class="box-title">Create New Product</h3>
        </div>
    </div>
    <div class="col-6 ps-3">
            <form method="post">
                <div class="form-group">
                    <label for="title">SKU</label>
                    <input type="text" class="form-control" name="sku" id="title"/>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                <div class="form-group">
                    <label for="title">Qty</label>
                    <input type="text" class="form-control" name="quantity" id="title"/>
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea id="content" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Save" />
            </form>
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