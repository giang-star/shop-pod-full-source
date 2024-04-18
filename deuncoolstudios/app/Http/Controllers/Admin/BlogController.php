<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $blogs = Blog::orderby('id')->paginate(20);
        $search = $request->search ?? '';
        if($search!=null){
            $blogs = Blog::where('name', 'like', "%" . $search . "%")->orderby('id')->paginate(20);
        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.create');
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
        $data['user_id'] = auth()->user()->id;
        if($request->hasFile('image')){
            $service = App::make('App\Utilities\Common');
            $data['image'] = $service->uploadFile($request->file('image'),'front/img/blog');
        }
        $user = Blog::create($data);
        return redirect('admin/blog/'. $user->id);
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
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.show', compact('blog'));
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
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.edit', compact('blog'));
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
        // handle file 
        if($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'front/img/blog');

            $file_name_old = $request->get('image_old');
            if($file_name_old!=''){
                unlink('front/img/blog' . $file_name_old);
            }
        }
        unset($data['image_old']);
        $blog = Blog::where('id',$id)->first();
        $blog->update($data);
        return redirect('admin/blog/' . $id);
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
        $blog = Blog::where('id',$id)->first();
        $blog->delete();
        return redirect('admin/blog');
    }
}
