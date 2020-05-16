<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        return view('backend.Login');
    }
    public function postLogin(Request $request)
    {
        $arr =['email' => $request->email, 'password' => $request->password];
        if($request->remember ='Remember Me'){
            $remember =true;
        }else{
            $remember =false;
        }
        if(Auth::attempt($arr,$remember)){
            return redirect()->intended('admin/home');
        }else{
            return back()->with('error','Tai khoan hay mật khẩu không đúng');
        }
    }
    
}
