<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function getCustomer()
    {
        $data['cuslist'] = Customer::all();
        return view('backend.customer',$data);
    }
    public function postCustomer(AddCustomerRequest $request)
    {
        $vp_customer = new Customer;
        $vp_customer->cus_Hokhachhang = $request->fname;
        $vp_customer->cus_Tenkhachhang = $request->lname;
        $vp_customer->cus_Sodienthoai = $request->number;
        $vp_customer->cus_Diachi = $request->diachi;
        $vp_customer->save();
        return back();
    }
    public function getEdit($id)
    {
        $data['customer'] = Customer::find($id);
        return view('backend.editcustomer',$data);
    }
    public function postEdit(Request $request,$id)
    {
        $vp_customer = Customer::find($id);
        $vp_customer->cus_Hokhachhang = $request->fname;
        $vp_customer->cus_Tenkhachhang = $request->lname;
        $vp_customer->cus_Sodienthoai = $request->number;
        $vp_customer->cus_Diachi = $request->diachi;
        $vp_customer->save();
        return redirect()->intended('admin/customer');
    }
    public function getDeleteCustomer($id)
    {
         Customer::destroy($id);
         return back();
    }
}
