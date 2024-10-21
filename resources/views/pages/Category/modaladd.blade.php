<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="product_category_code" class="form-label">Category Code</label>
                        <input type="text" class="form-control" id="product_category_code"
                            name="product_category_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="product_category_name"
                            name="product_category_name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary w-100" form="addCategoryForm">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
