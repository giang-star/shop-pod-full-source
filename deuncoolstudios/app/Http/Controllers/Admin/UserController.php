<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\Common;
use Illuminate\Http\Request;
use App\Http\Requests\Request\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderby('id')->paginate(20);
        // dd($users);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if($request->hasFile('image')){
            $service = App::make('App\Utilities\Common');
            $data['avatar'] = $service->uploadFile($request->file('image'),'front/img/user');
        }
        $user = User::create($data);
        return redirect('admin/user/'. $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('admin.user.show', compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $request->all();
        if($request->get('password')!=null){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }

        // handle file 
        if($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            $file_name_old = $request->get('image_old');
            if($file_name_old!=''){
                unlink('front/img/user' . $file_name_old);
            }
        }
        $user->update($data);
        return redirect('admin/user/' . $user->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        $file_name_old = $user->avatar;
        if($file_name_old != ''){
            unlink('front/img/user' . $file_name_old);
        }
        return redirect('admin/user/');
    }
}
