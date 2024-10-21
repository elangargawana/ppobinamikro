@extends('layouts.layout')

@section('title')
    Category
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add   Modal">
                    <i class="bi bi-plus-circle me-2"></i> Add Category
                </button>
            </div>
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="teamTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Product ID</th>
                                <th class="text-center">Category Code</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $value->product_id }}</td>
                                    <td class="text-center">{{ $value->product_category_code }}</td>
                                    <td class="text-center">{{ $value->product_category_name }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            onclick="setDeleteAction('{{ route('category.destroy', $value->id) }}')"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('pages.Category.modaladd')
@include('pages.Category.modaldelete')

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
