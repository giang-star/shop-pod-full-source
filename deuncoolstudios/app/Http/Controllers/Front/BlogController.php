<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\UserCart;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::orderbydesc('id')->paginate(6);
        $recentBlogs = Blog::orderbydesc('id')->limit(4)->get();
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/blog/index', compact('carts','total', 'blogs','recentBlogs'));

        }
        return view('front/blog/index', compact('blogs', 'recentBlogs'));
    }
    public function show($id){
        $blog = Blog::findOrFail($id);
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/blog/show', compact('carts','total', 'blog'));

        }
        return  view('front/blog/show', compact('blog'));
    }
    public function postComment(Request $request, $id){
        if(!auth()->user()){
            return redirect('account/login');
        }
        $data = $request->all();
        // dd($data);
        $data['name'] = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $data['email'] = auth()->user()->email;
        $data['user_id'] = auth()->user()->id;
        $data['blog_id']=$id;
        $check = BlogComment::where(['user_id'=>auth()->user()->id,'blog_id'=>$id])->first();
        if($check){
            $check->update($data);
            return redirect()->back();
        }
        BlogComment::create($data);
        return redirect()->back();
    }
}
