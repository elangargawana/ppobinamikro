<?php

namespace App\Http\Controllers;

use App\Models\CoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CoreProduct::all();
        return view('pages.Product.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|string',
            'product_code' => 'required|string',
            'product_name' => 'required|string'
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

            $product = new CoreProduct();

            $product->product_category_id = $request->product_category_id;
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->created_id = Auth::id();
            $product->edited_id = Auth::id();
            $product->deleted_id = Auth::id();
            $product->save();

            DB::commit();
            notyf()->success('Success Add Product');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'string',
            'product_code' => 'string',
            'product_name' => 'string'
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

            $product = CoreProduct::findOrFail($id);
            $product->update($validator);

            DB::commit();
            notyf()->success('Success Update Product');
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
        $product = CoreProduct::findOrFail($id);
        $product->delete();
        return back();
    }
}
