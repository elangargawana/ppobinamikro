<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product price</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductPriceForm" action="{{ route('productprice.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="productprice_category" class="form-label">Category</label>
                        <select class="form-select" onchange="getProducts(this.value)" id="productprice_category"
                            name="product_category_id" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->product_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_price_product" class="form-label">Product</label>
                        <select class="form-select" id="product_price_product" name="product_id" required>
                            <option value="" disabled selected>Select Product</option>
                            {{-- @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="item_unit_price" class="form-label">Item Unit Price</label>
                        <input type="text" class="form-control" id="item_unit_price" name="item_unit_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price_code" class="form-label">Product Price Code</label>
                        <input type="text" class="form-control" id="product_price_code" name="product_price_code"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price_name" class="form-label">Product Price Name</label>
                        <input type="text" class="form-control" id="product_price_name" name="product_price_name"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100" form="addProductPriceForm">Add</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        async function getProducts(id_category) {
            try {
                let url = `{{ url('products-by-category') }}/${id_category}`;
                const response = await fetch(url);

                if (!response.ok) {
                    console.error('Network response was not ok: ' + response.statusText);
                    return;
                }

                const data = await response.json();

                let products = '';
                data.forEach(element => {
                    products += `<option value="${element.id}">${element.product_name}</option>`;
                });

                const product_price_product = document.getElementById('product_price_product');

                product_price_product.innerHTML = '';
                product_price_product.innerHTML += '<option value="" disabled selected>Select Product</option>';
                product_price_product.innerHTML += products;

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    </script>
@endpush
