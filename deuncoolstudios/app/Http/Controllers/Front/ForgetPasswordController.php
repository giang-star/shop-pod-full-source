<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    //
    public function index(){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/account/forgetPassword/index', compact('carts','total'));
        }
        return view('front/account/forgetPassword/index');
    }

    public function sendLink(Request $request){
        $request->validate(
            [
                'email'=>'required|email|exists:users'
            ]
        );
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('front.account.mail.forgetPassword', ['token'=>$token], function($message) use ($request){
            $message->from('89thenext@gmail.com', 'Deuncoolstudios');
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('notification', 'Vui lòng kiểm tra email để lấy lại mật khẩu');
    }

    public function show($token){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front.account.forgetPassword.show', compact('carts','total', 'token'));
        }
        return view('front.account.forgetPassword.show', compact('token'));
    }

    public function changePassword(Request $request){
        $request->validate([
            'email'=> 'email|required|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/account/login')->with('message', 'Your password has been changed!');

    }
}
