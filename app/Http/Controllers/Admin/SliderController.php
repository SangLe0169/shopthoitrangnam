<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SliderController extends Controller
{
    //
    public function getSlider()
    {
        $data['slide'] =Slide::all();
        return view('backend.slider',$data);
    }
    public function postSlider(Request $request)
    {
        $filename =$request->img->getClientOriginalName();
        $slider = new Slide;
        $slider->images =$filename;
        $slider->save();
        $request->img->storeAs('avatar',$filename);
        return back();

    }
    public function getEdit($id)
    {
        $data['slider'] = Slide::find($id);
        return view('backend.editslide',$data);
    }
    public function postEdit(Request $request, $id)
    {
          $slider = new Slide;
          if($request->hasFile('img')){
            $img =$request->img->getClientOriginalName();
            $arr['images'] = $img;
            $request->img->storeAs('avatar',$img);
        }
        $slider::where('id',$id)->update($arr);
        return redirect('admin/slider');
    }
    public function getDeleteSlide($id)
    {
        Slide::destroy($id);
        return back();
    }

}
