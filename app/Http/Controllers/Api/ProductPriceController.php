<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productPrices = ProductPriceController::with('category', 'product')->get();

        return response()->json($productPrices, 200);
    }

    public function searchByPrefix(Request $request)
    {
        $prefix = $request->query('prefix');

        if (!$prefix) {
            return response()->json(['message' => 'Prefix tidak ditemukan'], 400);
        }

        $productPrice = ProductPrice::where('prefix', 'like', $prefix . '%')->first();

        if (!$productPrice) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json($productPrice, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productPrice = ProductPriceController::with('category', 'product')->find($id);

        if (!$productPrice) {
            return response()->json(['message' => 'Data harga produk tidak ditemukan'], 404);
        }

        return response()->json($productPrice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
