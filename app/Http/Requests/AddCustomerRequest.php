<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'lname'=>'unique:vp_customer,cus_Tenkhachhang'
        ];
    }
    public function messages(){
        return[
            'lname.unique'=>'Tên khách hàng bị trùng!'
        ];
    }
}
