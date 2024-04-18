<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $product = Product::where('id', $id)->firstOrFail();
        return view('admin.product.detail.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $product = Product::where('id', $id)->firstOrFail();
        return view('admin.product.detail.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $data = $request->all();
        ProductDetail::create($data);
        $this->updateQty($id);
        return redirect('admin/product/' . $id . '/detail');
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
    public function edit($product_id, $product_detail)
    {
        //
        $product = Product::where('id', $product_id)->firstOrFail();
        $detail = ProductDetail::where('id',$product_detail)->firstOrFail();
        return view('admin.product.detail.edit', compact('product', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product, $detail)
    {
        //
        $data = $request->all();
        $detail = ProductDetail::where('id', $detail)->firstOrFail();
        $detail->update($data);
        $this->updateQty($product);
        return redirect('admin/product/' . $product . '/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product, $detail)
    {
        //
        ProductDetail::find($detail)->delete();
        return redirect('admin/product/' . $product . '/detail');
    }
    public function updateQty($product_id){
        $product = Product::find($product_id);
        $productDetails = $product->productDetails;
        $total = array_sum(array_column($productDetails->toArray(), 'qty'));
        $product->qty = $total;
        $product->save();
    }
}
