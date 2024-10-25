<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CorePrefix;
use Illuminate\Http\Request;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prefixes = CorePrefix::with('category', 'product')->get();

        return response()->json($prefixes, 200);
    }

    public function getProductPriceByPrefix($prefix)
    {
        $prefixData = CorePrefix::where('prefix_code', 'like', "$prefix%")
            ->with('product')
            ->first();

        if ($prefixData && $prefixData->product) {
            return response()->json([
                'success' => true,
                'product_price' => $prefixData->product->price,
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan untuk prefix ini'], 404);
        }
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
        $prefix = CorePrefix::with('category', 'product')->find($id);

        if (!$prefix) {
            return response()->json(['message' => 'Data prefix tidak ditemukan'], 404);
        }

        return response()->json($prefix, 200);
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
