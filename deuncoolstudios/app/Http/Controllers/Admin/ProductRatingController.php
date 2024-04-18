<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    //
    public function index($id){
        $product = Product::where('id',$id)->firstOrFail();
        return view('admin.product.rating.index', compact('product'));
    }
    public function destroy($product_id, $product_comment_id){
        ProductComment::find($product_comment_id)->delete();
        return redirect('admin/product/' . $product_id . '/rating');
    }
}
