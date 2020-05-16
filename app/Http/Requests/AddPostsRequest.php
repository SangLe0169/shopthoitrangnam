<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostsRequest extends FormRequest
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
            'mabaiviet'=>'unique:vp_posts,pos_Mabaiviet',
            'tieude'=>'unique:vp_posts,pos_Tieudebaiviet'
        ];
        
    }

    public function messages(){
        return[
            'mabaiviet.unique'=>'Mã bài viết bị trùng!',
            'tieude.unique'=>'Tiêu đề bài viết bị trùng!'
        ];
    }
}
