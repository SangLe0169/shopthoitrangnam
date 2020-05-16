<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Size;
use App\Models\Order_detail;
use App\Models\Customer;
use DB;

class OrdersController extends Controller
{
    //
    public function getOrders()
    {
        $data['orders']= DB::table('vp_customer')
        ->join('vp_orders','vp_customer.cus_id','=','vp_orders.or_Customer')
        ->select('vp_customer.*','vp_orders.*')
        ->get();
        return view('backend.orders',$data);
    }
    public function getOrdersdetail()
    {
     
        $data['order_detail']= DB::table('vp_product')
        ->join('vp_orders_detail','vp_product.pro_id','=','vp_orders_detail.detail_Product')
        ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
        ->select('vp_orders_detail.*','vp_product.*','vp_sizes.*')
        ->get();
    
        //$data['size'] = Size::where('size_status',1)->orderBy('size_id','desc')->get();
        return view('backend.orders_detail',$data);
    }

}
