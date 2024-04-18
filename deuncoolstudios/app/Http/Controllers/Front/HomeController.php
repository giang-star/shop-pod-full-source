<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\UserCart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menProducts = Product::where('featured', true)->where('product_category_id',2)->get();
        $womenProducts = Product::where('featured', true)->where('product_category_id',1)->get();
        $blogs = Blog::orderbydesc('id')->limit(3)->get();
        $categories = ProductCategory::orderby('id')->limit(3)->get();
        // 


        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/index', compact('carts','total', 'menProducts', 'womenProducts', 'blogs', 'categories'));

        }
        return view('front/index', 
            [
                'menProducts'=>$menProducts,
                'womenProducts'=>$womenProducts,
                'blogs'=>$blogs,
                'categories'=>$categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
    public function contact(){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/contact', compact('carts','total'));
        }
        return view('front/contact');
    }
}
