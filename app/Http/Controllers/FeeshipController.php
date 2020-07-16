<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

class FeeshipController extends Controller
{
    //
    public function getDelivery(Request $request)
    {
        $city['thanhpho']= City::orderby('matp','ASC')->get();
        return view('backend.delivery',$city);
    }
    public function insert_delivery(Request $request)
    {
        $data = $request->all();
        $feeship = new Feeship();
        $feeship->fee_matp = $data['city'];
        $feeship->fee_maqh = $data['province'];
        $feeship->fee_xaid = $data['wards'];
        $feeship->fee_feeship = $data['fee_ship'];
        $feeship->save();
      
    }
    public function postDelivery(Request $request)
    {
        $this->validate($request,
            [
                'city' =>'required|unique:fee_matp',
                'province' => 'required|unique:fee_maqh',
                'wards'=>'required| unique:fee_xaid',
               
            ],
            [
                'city.unique' => 'Mã thành phố đã them trước đó',
                'province.unique' => 'Mã tỉnh đã them trước đó',
                'wards.unique' => 'Mã xã đã them trước đó',
            ]
        );
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
}
