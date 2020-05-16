<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use DB;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $datapro['productlist'] =DB::table('vp_product')
                ->join('categories','vp_product.pro_cate','=','categories.cate_id')
                ->join('vp_brand','vp_product.pro_Thuonghieu','=','vp_brand.brand_id')
                ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
                ->select('vp_product.*','vp_brand.*','categories.*','vp_sizes.*')->get();
        $data['catelist']= Category::all();
        $data['brand'] = Brand::all();
        $data['size'] = Size::all();
        return view('backend.product',$data,$datapro);
    }
    public function postProduct(AddProductRequest $request)
    {
        $filename =$request->img->getClientOriginalName();
        $product =new Product;
        $product->pro_Tensanpham = $request->name;
        $product->pro_Thuonghieu = $request->thuonghieu;
        $product->pro_Gia = $request->price;
        $product->pro_Hinhanh =$filename;
        $product->pro_Giamgia = $request->giamgia;
        $product->pro_Khuyenmai = $request->promotion;
        $product->pro_Nhommau = $request->nhommau;
        $product->pro_Soluong = $request->soluong;
        $product->pro_Kichthuoc = $request->size;
        $product->pro_Mota = $request->description;
        $product->pro_Trangthai = $request->trangthai;
        $product->pro_featured =$request->featured;
        $product->pro_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avatar',$filename);
        return back();
    }
    public function getEdit($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] =Category::all();
        $data['brands'] =Brand::all();
        $data['size'] =Size::all();
        return view('backend.editproduct',$data);
    }
    public function postEdit(Request $request,$id)
    {
        $product =new Product;
        $arr['pro_Tensanpham'] = $request->name;
        $arr['pro_Thuonghieu'] = $request->thuonghieu;
        $arr['pro_Gia'] = $request->price;
        if($request->hasFile('img')){
            $img =$request->img->getClientOriginalName();
            $arr['pro_Hinhanh'] = $img;
            $request->img->storeAs('avatar',$img);
        }
        $arr['pro_Giamgia'] = $request->giamgia;
        $arr['pro_Khuyenmai'] = $request->khuyenmai;
        $arr['pro_Nhommau'] = $request->nhommau;
        $arr['pro_Soluong'] = $request->soluong;
        $arr['pro_Kichthuoc'] = $request->size;
        $arr['pro_Mota'] = $request->description;
        $arr['pro_Trangthai'] = $request->trangthai;
        $arr['pro_featured'] =$request->featured;
        $arr['pro_cate'] = $request->cate;
        $product::where('pro_id',$id)->update($arr);
        return redirect('admin/product');
    }

    public function getDeleteProduct($id)
    {
          Product::destroy($id);
          return back();
    }
}
