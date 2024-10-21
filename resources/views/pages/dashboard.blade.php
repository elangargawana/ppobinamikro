@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- New Orders Box -->
                <div class="col-lg-3 col-6">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="row">
                                    <p class="card-text fw-bolder fs-4">Product Category</p>
                                </div>
                                <i class="bi bi-tag-fill display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="text-white text-decoration-none small-box-footer">
                                More info <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bounce Rate Box -->
                <div class="col-lg-3 col-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="row">
                                    <p class="card-text fw-bolder fs-4">Product</p>
                                </div>
                                <i class="bi bi-bag-fill display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="text-white text-decoration-none small-box-footer">
                                More info <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Registrations Box -->
                <div class="col-lg-3 col-6">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="row">
                                    <p class="card-text fw-bolder fs-4">Product Price</p>
                                </div>
                                <i class="bi bi-wallet-fill display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="text-white text-decoration-none small-box-footer">
                                More info <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Unique Visitors Box -->
                <div class="col-lg-3 col-6">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="row">
                                    <p class="card-text fw-bolder fs-4">Prefix</p>
                                </div>
                                <i class="bi bi-sticky-fill display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="text-white text-decoration-none small-box-footer">
                                More info <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
