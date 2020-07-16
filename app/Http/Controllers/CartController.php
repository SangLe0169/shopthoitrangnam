<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use Mail;
use app\paypal;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Attributes;
use App\Models\Carts;
use Session;
use DB;

class CartController extends Controller
{
    //
    public function getAddCart(Request $request,$id)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $product = Product::with('attributes')->where(['pro_id'=>$id])->first();
        Cart::add(['id' => $id, 'name' => $product->pro_Tensanpham, 'qty' => 1, 'price' => $product->pro_Gia, 'weight' => 550, 'options' => ['img' => $product->pro_Hinhanh], ['size' => $product->size]]);
        return redirect('cart/show')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function __construct() {
        $this->middleware('auth');
    }
    public function getShow(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['total'] = Cart::total();
        $data['items'] =Cart::content();
        
        return view('fontend.carts',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function getDelete($id)
    {
        if($id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    
    public function getUpdate(Request $request)
    {
       Cart::update($request->rowId,$request->qty);
    }
    public function getCheckout(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        $data['thanhpho'] = City::orderby('matp','ASC')->get();
        return view('fontend.checkout',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function addtocart(Request $request)
    {
        //$data = $request->all();
        //echo "<pre>"; print_r($data);
       

                
       
       
        
    }
    public function postDelivery(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                   $output.='<option>--Chọn quận huyện--</option>';
                foreach($select_province as $province){
                $output.= '<option value="' .$province->maqh. '">' .$province->name_quanhuyen. '</option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>--Chọn xã phường--</option>';
                foreach($select_wards as $wards){
                $output.= '<option value="' .$wards->xaid. '">' .$wards->name_xaphuong. '</option>';
                }
            }
        }
        echo $output;
    }
    public function getDelfee()
    {
        Session::forget('fee');
        return Redirect()->back();
    }
    public function postCalculate(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            foreach($feeship as $fee){
                Session::put('fee',$fee->fee_feeship);
                Session::save();
            }
        }
    }
    public function postCheckout(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
         $customer =new Customer;
         $customer->cus_Hokhachhang = $request->hodem;
         $customer->cus_Tenkhachhang = $request->ten;
         $customer->cus_Sodienthoai = $request->sodienthoai;
         $customer->cus_Diachi = $request->diachi;
         $customer->cus_Email = $request->email;
         $customer->cus_Note = $request->message;
         $customer->save();

    
         $checkout_code = substr(md5(microtime()),rand(0,26),5);

         $oders =new Orders;
         $oders->or_Ngaydat =  date('Y-m-d');
         $oders->or_Tongtien = Cart::total();
         $oders->or_Payment =$request->payment_method;
         $oders->or_Customer =$customer->cus_id;
         $oders->or_Trangthai = 1;
         $oders->or_code = $checkout_code;
         $oders->save();

         $carts = Cart::content();
         foreach($carts as $cart){
            $oder_detail = new Order_detail;
            $oder_detail->detail_Order = $oders->or_id;
            $oder_detail->detail_Product =$cart->id;
            $oder_detail->detail_Soluong = $cart->qty;
            $oder_detail->or_code = $checkout_code;
            $oder_detail->detail_Đonvigia = $cart->price;
            $oder_detail->save();
         }

       
         $data['info'] = $request->all();
         $email = $request->email;
         $data['total'] = Cart::total();
         $data['items'] = Cart::content();
         Mail::send('email.email_oder',$data,function($message) use($email){
                  $message->from('lesan0169@gmail.com','Shop thoi trang');
                  $message->to($email,$email);
                  $message->cc('lesang0169@gmail.com','Lê Sang');
                  $message->subject('Xác nhận đơn hàng ');
         });
         Cart::destroy();
         return redirect('/thanhtoan')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
         
        
    }
    public function postPay(Request $request)
    {

        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
         $customer =new Customer;
         $customer->cus_Hokhachhang = $request->hodem;
         $customer->cus_Tenkhachhang = $request->ten;
         $customer->cus_Sodienthoai = $request->sodienthoai;
         $customer->cus_Diachi = $request->diachi;
         $customer->cus_Email = $request->email;
         $customer->cus_Note = $request->message;
         $customer->save();

    
         $checkout_code = substr(md5(microtime()),rand(0,26),5);

         $oders =new Orders;
         $oders->or_Ngaydat =  date('Y-m-d');
         $oders->or_Tongtien = Cart::total();
         $oders->or_Payment =$request->payment_method;
         $oders->or_Customer =$customer->cus_id;
         $oders->or_Trangthai = 1;
         $oders->or_code = $checkout_code;
         $oders->save();

         $carts = Cart::content();
         foreach($carts as $cart){
            $oder_detail = new Order_detail;
            $oder_detail->detail_Order = $oders->or_id;
            $oder_detail->detail_Product =$cart->id;
            $oder_detail->detail_Soluong = $cart->qty;
            $oder_detail->or_code = $checkout_code;
            $oder_detail->detail_Đonvigia = $cart->price;
            $oder_detail->save();
         }
         Cart::destroy();
         return back()->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
 
 
    public function getThanhtoan(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        return view('fontend.thanhtoan')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function getCreate(Request $request)
    {
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "CB9U99KK"; //Mã website tại VNPAY 
        $vnp_HashSecret = "WYPJYFWUFHCCGUYWALRQTGSVNLTNNKII"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $items = Cart::content();
        foreach($items as $item)
        {
            $item = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $item->price,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
        }
       

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($item);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($item as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
 
}
