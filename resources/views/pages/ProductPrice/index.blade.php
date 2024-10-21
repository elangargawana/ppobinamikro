@extends('layouts.layout')

@section('title')
    Product
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add Product
                </button>
            </div>
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="teamTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Price</th>
                                <th class="text-center">Item Unit Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
