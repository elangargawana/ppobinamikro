<?php

namespace App\Http\Controllers;

use App\Models\CorePrefix;
use App\Models\CoreProduct;
use App\Models\CoreProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CorePrefix::all();
        $categories = CoreProductCategory::all();
        $products = CoreProduct::all();
        return view('pages.Prefix.index', compact('data', 'categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|string|exists:core_product_category,id',
            'product_id' => 'required|string|exists:core_product,id',
            'prefix_code' => 'required|string|unique:core_prefix,prefix_code',
            'prefix_name' => 'required|string'
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

            $prefix = new CorePrefix();

            $prefix->product_category_id = $request->product_category_id;
            $prefix->product_id = $request->product_id;
            $prefix->prefix_code = $request->prefix_code;
            $prefix->prefix_name = $request->prefix_name;
            $prefix->created_id = Auth::id();
            $prefix->edited_id = Auth::id();
            $prefix->deleted_id = Auth::id();
            $prefix->save();

            DB::commit();
            notyf()->success('Success Add Prefix');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function getProductsBycategory($categoryId)
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
            'product_category_id' => 'string|exists:core_product_category,id',
            'product_id' => 'string|exists:core_product,id',
            'prefix_code' => 'string|unique:core_product,product_code,' . $id,
            'prefix_name' => 'string'
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

            $prefix = CorePrefix::findOrFail($id);
            $prefix->update($validator);

            DB::commit();
            notyf()->success('Success Update Prefix');
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
        $prefix = CorePrefix::findOrFail($id);
        $prefix->delete();
        return back();
    }
}
