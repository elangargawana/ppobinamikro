<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Prefix</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPrefixForm" action="{{ route('prefix.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="prefix_category" class="form-label">Category</label>
                        <select class="form-select" onchange="getProducts(this.value)" id="prefix_category"
                            name="product_category_id" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->product_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prefix_product" class="form-label">Product</label>
                        <select class="form-select" id="prefix_product" name="product_id" required>
                            <option value="" disabled selected>Select Product</option>
                            {{-- @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prefix_code" class="form-label">Prefix Code</label>
                        <input type="text" class="form-control" id="prefix_code" name="prefix_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="prefix_name" class="form-label">Prefix Name</label>
                        <input type="text" class="form-control" id="prefix_name" name="prefix_name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100" form="addPrefixForm">Add</button>
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

                const prefix_product = document.getElementById('prefix_product');

                prefix_product.innerHTML = '';
                prefix_product.innerHTML += '<option value="" disabled selected>Select Product</option>';
                prefix_product.innerHTML += products;

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    </script>
@endpush
