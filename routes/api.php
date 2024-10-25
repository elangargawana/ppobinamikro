<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PrefixController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPriceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::get('/product-price-by-prefix/{prefix}', [PrefixController::class, 'getProductPriceByPrefix']);
Route::get('/prefix', [PrefixController::class, 'index']);
Route::get('/prefix/{id}', [PrefixController::class, 'show']);

Route::get('/productprice/search', [ProductPriceController::class, 'searchByPrefix']);
Route::get('/productprice', [ProductPriceController::class, 'index']);
Route::get('/productprice/{id}', [ProductPriceController::class, 'show']);
