@extends('layouts.layout')

@section('title')
    Prefix
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add Prefix
                </button>
            </div>
            <div class="p-5 profile-card bg-white border rounded-3">
                <div class="table-responsive">
                    <table id="teamTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Prefix Code</th>
                                <th class="text-center">Prefix Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">123456</td>
                                <td class="text-center">Tsel</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
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

@include('pages.Prefix.modaladd')
@include('pages.Prefix.modaldelete')

@push('js')
    <script>
        let table = new DataTable('#teamTable');
    </script>
@endpush
