<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\UserCart;
use Exception;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $categories = ProductCategory::all();

        $brands = Brand::all();

        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';

        $products = Product::where('name', 'like', "%" . $search . "%");

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($products,$sortBy,$perPage);

        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/shop/index', compact('carts','total', 'products', 'brands', 'categories'));

        }

        return view('front.shop.index', compact('products', 'categories', 'brands'));
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
        $categories = ProductCategory::all();

        $brands = Brand::all();

        $product = Product::findOrFail($id);
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(),'rating'));
        $countRating = count($product->productComments);

        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
                                    ->where('tag', $product->tag)
                                    ->limit(4)
                                    ->get();
        if($countRating!=0){
            $avgRating = $sumRating/$countRating;
        }

        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/shop/show', compact('carts','total', 'product', 'avgRating', 'relatedProducts', 'brands', 'categories'));

        }
        return view('front/shop/show',[
            'product'=>$product,
            'avgRating'=>$avgRating,
            'relatedProducts'=>$relatedProducts,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
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

    public function postComment(Request $request){
        if(!auth()->user()){
            return redirect('account/login');
        }
        $data = $request->all();
        $data['name'] = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $data['email'] = auth()->user()->email;
        $check = ProductComment::where(['user_id'=>$data['user_id'],'product_id'=>$data['product_id']])->first();
        if($check){
            $check->update($data);
            return redirect()->back();
        }
        ProductComment::create($data);
        return redirect()->back();
    }
    public function category($categoryName, Request $request){
        $categories = ProductCategory::all();
        $brands = Brand::all();

        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';
        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery();

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($products, $sortBy, $perPage);

        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front.shop.index', compact('carts','total', 'products', 'categories', 'brands'));

        }

        return view('front.shop.index', compact('products','categories', 'brands'));
    }
    public function sortAndPagination($products,$sortBy,$perPage){
        switch($sortBy){
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default: 
                $products = $products->orderBy('id');
                break;
        }

        $products = $products->paginate($perPage);
        $products->appends(['sort_by'=>$sortBy,'show'=>$perPage]);
        return $products;
    }
    public function filter($products, Request $request){
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids!=null ? $products->whereIn('brand_id',$brand_ids):$products;

        //price
        $priceMin = $request->price_min;
        $priceMax = $request->price_max;
        $priceMin = str_replace('đ', '', $priceMin);
        $priceMax = str_replace('đ', '', $priceMax);
        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price', [$priceMin, $priceMax])->orderby('price') : $products;
        //color
        $color = $request->color;
        $products = $color != null 
                            ? $products->whereHas('productDetails', function ($query) use ($color) {
                                return $query->where('color', $color)->where('qty', '>', 0);
                                })
                            : $products;

        //size

        $size = $request->size;
        $products = $size != null 
                            ? $products->whereHas('productDetails', function ($query) use ($size) {
                                return $query->where('size', $size)->where('qty', '>', 0);
                                })
                            : $products;

        return $products;
    }
}
