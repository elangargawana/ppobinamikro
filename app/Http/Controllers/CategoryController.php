<?php

namespace App\Http\Controllers;

use App\Models\CoreProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CoreProductCategory::all();
        return view('pages.Category.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string',
            'product_category_code' => 'required|string',
            'product_category_name' => 'required|string'
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

            $category = new CoreProductCategory();

            $category->product_id = $request->product_id;
            $category->product_category_code = $request->product_category_code;
            $category->product_category_name = $request->product_category_name;
            $category->created_id = FacadesAuth::id();
            $category->edited_id = FacadesAuth::id();
            $category->deleted_id = FacadesAuth::id();
            $category->save();

            DB::commit();
            notyf()->success('Success Add Category');
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
            'product_id' => 'string',
            'product_category_code' => 'string',
            'product_category_name' => 'string'
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

            $category = CoreProductCategory::findOrFail($id);
            $category->update($validator);

            DB::commit();
            notyf()->success('Success Update Category');
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
        $category = CoreProductCategory::findOrFail($id);
        $category->delete();
        return back();
    }
}
