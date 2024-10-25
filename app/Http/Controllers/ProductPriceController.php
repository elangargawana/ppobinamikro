<?php

namespace App\Http\Controllers;

use App\Models\CoreProduct;
use App\Models\CoreProductCategory;
use App\Models\CoreProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CoreProductPrice::all();
        $categories = CoreProductCategory::all();
        $products = CoreProduct::all();
        return view('pages.ProductPrice.index', compact('data', 'categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|string|exists:core_product_category,id',
            'product_id' => 'required|string|exists:core_product,id',
            'item_unit_price' => 'required|string',
            'product_price_code' => 'required|string|unique:core_product_price,product_price_code',
            'product_price_name' => 'required|string'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        try {
            DB::beginTransaction();

            //CoreProductCategory::create($validator);

            $productprice = new CoreProductPrice();

            $productprice->product_category_id = $request->product_category_id;
            $productprice->product_id = $request->product_id;
            $productprice->item_unit_price = $request->item_unit_price;
            $productprice->product_price_code = $request->product_price_code;
            $productprice->product_price_name = $request->product_price_name;
            $productprice->created_id = Auth::id();
            $productprice->edited_id = Auth::id();
            $productprice->deleted_id = Auth::id();
            $productprice->save();

            DB::commit();
            notyf()->success('Success Add Product Price');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function getProductsByCategory($categoryId)
    {
        $data = CoreProduct::where('product_category_id', $categoryId)->get();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'string',
            'product_id' => 'string',
            'item_unit_price' => 'string',
            'product_price_code' => 'string',
            'product_price_name' => 'string'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        try {
            DB::beginTransaction();

            //CoreProductCategory::create($validator);

            $productprice = CoreProductPrice::findOrFail($id);
            $productprice->update($validator);

            DB::commit();
            notyf()->success('Success Update Product Price');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productprice = CoreProductPrice::findOrFail($id);
        $productprice->delete();
        return back();
    }
}
