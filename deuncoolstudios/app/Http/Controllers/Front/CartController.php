<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    //
    public function add(Request $request,$id){
        $product = Product::findOrFail($id);
        // dd($id);
        // dd($request->size);
        // dd($req_size);
        if($request->qty){
            $req_qty = $request->qty;
        }
        else{
            $req_qty=1;
        }
        if($request->size){
            $req_size = $request->size;
        }
        else{
            $req_size = ProductDetail::where('product_id',$product->id)->first()->size;
        }
        $product_detail = ProductDetail::where(['product_id'=>$product->id, 'size'=>$req_size])->first();
        if($product_detail->qty < 1) return redirect()->back()->with('notification', "Sản phẩm hiện đang hết, vui lòng thử chọn size khác hoặc giảm số lượng");
        $Ss_cart = Cart::add([
            'id'=> $id,
            'name'=> $product->name,
            'qty'=> $req_qty,
            'price'=> $product->discount ?? $product->price,
            'weight'=> $product->weight ?? 0,
            'options'=> [
                'images'=> $product->productImages,
                'size'=>$req_size
            ]
        ]);
        // dd($Ss_cart);
        if(auth()->user()){
            $cart = UserCart::where(['user_id' => auth()->user()->id])->get();
            if(count($cart)==0){
                $product = Product::where('id',$id)->first();
                if($product->discount != null){
                    $price = $product->discount;
                }
                else{
                    $price = $product->price;
                }
                $data = [
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$id,
                    'qty'=>$req_qty,
                    'size'=>$req_size,
                    'price'=>$price,
                    'total'=>$price*$req_qty,
                    'image'=>$product->productImages[0]->path
                ];
                UserCart::create($data);
            }
            else if($cart->where('product_id',$id)->first()){
                $cart = UserCart::where(['user_id' => auth()->user()->id,'product_id'=> $id])->firstOrFail();
                if($req_qty!=null){
                    $cart->qty = $cart->qty+$req_qty;
                }
                else{
                    $cart->qty = $cart->qty+1;
                }
                $cart->total = $cart->qty * $cart->price;
                $cart->save();
            }
            else{
                $product = Product::where('id',$id)->first();
                if($product->discount != null){
                    $price = $product->discount;
                }
                else{
                    $price = $product->price;
                }
                $data = [
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$id,
                    'qty'=>$req_qty,
                    'size'=>$req_size,
                    'price'=>$price,
                    'total'=>$price*$req_qty,
                    'image'=>$product->productImages[0]->path
                ];
                UserCart::create($data);
            }
        }
        return back();
    }
    public function index(){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }
        }
        else{
            $carts = Cart::content();
            $total = Cart::total();
        }
        return view('front.shop.cart', compact('carts', 'total'));
    }
    public function delete($rowId){
        if(auth()->user()){
            $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $rowId])->firstOrFail();
            $cart->delete();
        }
        else{
            Cart::remove($rowId);
        }
        return back();
    }
    public function destroy(){
        if(auth()->user()){
            UserCart::where('user_id',auth()->user()->id)->delete();
        }
        else{
            Cart::destroy();
        }
        return back();
    }
    public function update(Request $request){
        if($request->ajax()){
            if(auth()->user()){
                if($request->qty==0){
                    $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $request->rowId])->firstOrFail();
                    $cart->delete();
                }
                else{
                    $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $request->rowId])->firstOrFail();
                    $cart->qty = $request->qty;
                    $cart->total = $request->qty * $cart->price;
                    $cart->save();
                }
                
            }
            else{
                
                Cart::update($request->rowId, $request->qty);
            }
        }
    }
}
