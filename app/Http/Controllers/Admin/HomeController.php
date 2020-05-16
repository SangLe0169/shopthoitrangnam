<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Orders;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    //
    public function getHome(){
        $product_count['count'] =  Product::count();
        $product_count['customer_count'] =  Customer::count();
        $product_count['order_count'] =  Orders::count();
        return view('admin_layout',$product_count);
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }
   
}
