<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Orders;
use DB;
use Session;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        
         return view('backend.Login');
    }

    public function getHome(Request $request){
           $product_count['count'] =  Product::count();
           $product_count['customer_count'] =  Customer::count();
            $product_count['order_count'] =  Orders::count();
        
           
           
            return view('admin_layout',$product_count);
         }
    public function getLogout()
    {
               Session::put('email',null);
               Session::put('user_id',null);
               return redirect('admin/login');
      }
    public function postLogin(Request $request)
    {
        $product_count['count'] =  Product::count();
        $product_count['customer_count'] =  Customer::count();
         $product_count['order_count'] =  Orders::count();
       $admin_email = $request->email;
       $admin_password = md5($request->password);
     
        $result = DB::table('vp_users')->where('email',$admin_email)->where('password',$admin_password)->first();
        if($result){
            Session::put('email',$result->email);
            Session::put('user_id',$result->user_id);
            return redirect('admin/home');
        }else{
            Session::put('message','Tài khoản và mật khẩu sai. Vui lòng nhập lại');
            return redirect('admin/login');
        }
      
      
       
         
    }

    
}
