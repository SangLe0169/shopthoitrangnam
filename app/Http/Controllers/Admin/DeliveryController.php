<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

class DeliveryController extends Controller
{
    //
   
    public function getDelivery(Request $request)
    {
        $city['thanhpho']= City::orderby('matp','ASC')->get();
        return view('backend.delivery',$city);
    }
    public function seclect_fee()
    {
        $feeship =Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .='<div class="table-reponsive">
              <table class ="table table-border">
              <thread>
                  <tr>
                     <th>Tên thành phố</th>
                     <th>Tên quận huyện</th>
                     <th>Tên xã phường</th>
                     <th>Phí vận chuyển</th>
                  </tr>
              </thread>
              <tbody>
        ';
        foreach($feeship as $fee){
            $output .= '
              <tr>
                <td>'.$fee->city->name_city.'</td>
                <td>'.$fee->province->name_quanhuyen.'</td>
                <td>'.$fee->wards->name_xaphuong.'</td>
                <td contenteditable data-feeship_id = "'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
              </tr>
            ';
        }
        $output .= '
           </tbody>
           </table></div>
        ';
        echo $output;

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
        return back();
    }
    public function update_delivery(Request $request)
    {
         $data = $request->all();
         $feeship = Feeship::find($data['feeship_id']);
         $feevalue = rtrim($data['fee_value'],'.');
         $feeship->fee_feeship = $feevalue;
         $feeship->save();
       
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
}
