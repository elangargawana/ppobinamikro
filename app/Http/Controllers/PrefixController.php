<?php

namespace App\Http\Controllers;

use App\Models\CorePrefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CorePrefix::all();
        return view('pages.Prefix.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|string',
            'product_id' => 'required|string',
            'prefix_code' => 'required|string',
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'string',
            'product_id' => 'string',
            'prefix_code' => 'string',
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
