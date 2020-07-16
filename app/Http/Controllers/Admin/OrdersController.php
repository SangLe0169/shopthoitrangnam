<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Size;
use App\Models\Order_detail;
use App\Models\Customer;
use App\Models\Product;
use DB;
use PDF;

class OrdersController extends Controller
{
    //
    public function getPrint_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $or_details= Order_detail::where('or_code',$checkout_code)->get();
        $orders = Orders::where('or_code',$checkout_code)->get();
        foreach($orders as $key => $ord){
            $order_status = $ord->or_Trangthai;
            $cus_id = $ord->or_Customer;
        }
        $order_detail= DB::table('vp_product')
        ->join('vp_orders_detail','vp_product.pro_id','=','vp_orders_detail.detail_Product')
        ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
        ->select('vp_orders_detail.*','vp_product.*','vp_sizes.*')
        ->where('or_code',$checkout_code)
        ->get();
        $customer = Customer::where('cus_id',$cus_id)->first();
        $output ='';

        $output.='<style>
           body{
               font_family: DejaVu Sans;
           }
           .table-styling{
               border:1px solid #000;
           }
           .table-styling tbody tr td{
               border:1px solid #000;
           }
        </style>
         <h1><center>Shop bán hàng thời trang nam</center></h1>
         <h4><center>Độc lập-Tự do-Hạnh phúc</center></h4>
         <p>Người đặt hàng</p>
        <table class = "table-styling">
            <thead>
               <tr>
                    <th>Họ khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
               </tr>
               </thead>
               <tbody>';
            $output.='
               <tr>
                  <td>'.$customer->cus_Hokhachhang.'</td>
                  <td>'.$customer->cus_Tenkhachhang.'</td>
                  <td>'.$customer->cus_Sodienthoai.'</td>
                  <td>'.$customer->cus_Email.'</td>
               </tr>';
           $output.='
               </tbody>
            </table>

            <p>Đơn hàng</p>
            <table class = "table-styling">
                <thead>
                   <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                        <th>Kích thước</th>
                        <th>Giá</th>
                   </tr>
                   </thead>
                   <tbody>';
                   foreach($order_detail as $key => $product){
                $output.='
                   <tr>
                      <td>'.$product->pro_Tensanpham.'</td>
                      <td>'.$product->detail_Soluong.'</td>
                      <td>'.$product->pro_Hinhanh.'</td>
                      <td>'.$product->size_name.'</td>
                      <td>'.$product->pro_Gia*$product->pro_Soluong.'đ'.'</td>
                   </tr>';
                   }
               $output.='
                   </tbody>
                </table>
            
            
            ';
        
        return $output;
    }
    public function getOrders()
    {
        $data['orders']= DB::table('vp_customer')
        ->join('vp_orders','vp_customer.cus_id','=','vp_orders.or_Customer')
        ->select('vp_customer.*','vp_orders.*')
        ->get();
         
        return view('backend.orders',$data);
    }
    public function view_order($or_code)
    {
         $or_details= Order_detail::where('or_code',$or_code)->get();
         $orders = Orders::where('or_code',$or_code)->get();
         foreach($orders as $key => $ord){
             $order_status = $ord->or_Trangthai;
         }
         $data['order_detail']= DB::table('vp_product')
         ->join('vp_orders_detail','vp_product.pro_id','=','vp_orders_detail.detail_Product')
         ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
         ->select('vp_orders_detail.*','vp_product.*','vp_sizes.*')
         ->where('or_code',$or_code)
         ->get();
     
         return view('backend.orders_detail',$data)->with(compact('or_details','orders','order_status'));
    }
    public function post_Update_quantity(Request $request)
    {
            $data = $request->all();
            $orders = Orders::find($data['order_id']);
            $orders->or_Trangthai = $data['order_status'];
            $orders->save();
            if($orders->or_Trangthai==2){
                foreach($data['order_checkout_quantity'] as $key => $pro_id){
                    $product = Product::find($pro_id);
                    $pro_Soluong = $product->pro_Soluong;
                    $pro_sold = $product->pro_sold;
                    foreach($data['quantity'] as $key2 => $detail_Soluong){
                           if($key==$key2){
                                $pro_remain = $pro_Soluong - $detail_Soluong;
                                $product->pro_Soluong = $pro_remain;
                                $product->pro_sold =$pro_sold + $detail_Soluong;
                                $product->save();
                           }
                    }
                }
            }elseif($orders->or_Trangthai!=2 && $orders->or_Trangthai!=3){
                foreach($data['order_checkout_quantity'] as $key => $pro_id){
                    $product = Product::find($pro_id);
                    $pro_Soluong = $product->pro_Soluong;
                    $pro_sold = $product->pro_sold;
                    foreach($data['quantity'] as $key2 => $detail_Soluong){
                           if($key==$key2){
                                $pro_remain = $pro_Soluong + $detail_Soluong;
                                $product->pro_Soluong = $pro_remain;
                                $product->pro_sold =$pro_sold - $detail_Soluong;
                                $product->save();
                           }
                    }
                }
            }
    }
    public function post_Update_Qty(Request $request)
    {
        $data= $request->all();
        $order_detail = Order_detail::where('detail_Product',$data['order_checkout_quantity'])->where('or_code',$data['order_code'])->first();
        $order_detail->detail_Soluong = $data['order_qty'];
        $order_detail->save();
    }
    public function del_Oder($id)
    {
        Orders::destroy($id);
        return back();
    }
    public function getOrdersdetail()
    {
     
        $data['order_detail']= DB::table('vp_product')
        ->join('vp_orders_detail','vp_product.pro_id','=','vp_orders_detail.detail_Product')
        ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
        ->select('vp_orders_detail.*','vp_product.*','vp_sizes.*')
        ->get();
    
        
        $data['size'] = Size::where('size_status',1)->orderBy('size_id','desc')->get();
        return view('backend.orders_detail',$data);
    }
   

}
