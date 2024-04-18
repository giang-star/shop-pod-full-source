<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $productCategories = ProductCategory::orderby('id')->paginate(20);
        $search = $request->search ?? '';
        if($request->search !=null){
            $productCategories = ProductCategory::where('name', 'like', "%" . $search . "%")->orderby('id')->paginate(20);
        }

        return view('admin.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->all();
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        ProductCategory::create($data);
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productCategory = ProductCategory::where('id', $id)->firstOrFail();
        return view('admin.category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $productCategory = ProductCategory::where('id',$id)->firstOrFail();
        $productCategory->update($data);
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $productCategory = ProductCategory::where('id',$id)->firstOrFail();
        $productCategory->delete();
        return redirect('admin/category');
    }
}
