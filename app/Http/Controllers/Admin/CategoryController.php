<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function getCate()
    {
        $data['catelist'] =Category::all();
        return view('backend.category',$data);
    }
    public function postCate(AddCateRequest $request)
    {
         $categories =new Category;
         $categories->cate_name =$request->name;
         $categories->meta_keywords =$request->meta_keywords;
         $categories->cate_slug =Str::slug($request->name);
         $categories->save();
         return back();

    }
    public function getEdit($id)
    {
        $data['cate'] = Category::find($id);
        return view('backend.editcate',$data);
    }
    public function postEdit(EditCateRequest $request,$id)
    {
         $categories = Category::find($id);
         $categories->cate_name =$request->name;
         $categories->meta_keywords =$request->meta_keywords;
         $categories->cate_slug =Str::slug($request->name);
         $categories->save();
         return redirect()->intended('admin/category');
    }

    public function getDeleteCate($id)
    {
         Category::destroy($id);
         return back();
    }
}
