<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Slide;
use App\Models\Comment;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Attributes;
use App\Models\Posts;
use Mail;
use Auth;
use DB;
use Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   
    public function index(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['featured'] = Product::where('pro_featured',1)->orderBy('pro_id','desc')->take(4)->get();
        $data['news'] = Product::orderBy('pro_id','desc')->take(3)->get();
        $data['promotion'] = Product::where('pro_Khuyenmai',1)->orderBy('pro_id','desc')->take(3)->get();
        return view('fontend.home',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function getBlog(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['blog'] = Posts::all();
        return view('fontend.blog',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function getBlogdetail(Request $request,$id)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['blogs'] = Posts::find($id);
        return view('fontend.blog_detail',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    
    public function chitietsanpham(Request $request,$id)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $comment = DB::table('users')
              ->join('vp_comment','users.id','=','vp_comment.com_user')
              ->join('vp_product','vp_comment.com_product','=','vp_product.pro_id')
              ->select('users.name','vp_comment.*')
              ->where(['vp_product.pro_id'=>$id])
              ->get();
        $data['brands'] = DB::table('vp_product')
              ->join('vp_brand','vp_product.pro_Thuonghieu','=','vp_brand.brand_id')
              ->select('vp_product.*','vp_brand.*')
              ->where(['vp_product.pro_id'=>$id])
              ->get();
        // $data['sizes'] = DB::table('vp_product')
        //       ->join('vp_sizes','vp_product.pro_Kichthuoc','=','vp_sizes.size_id')
        //       ->select('vp_product.*','vp_sizes.*')
        //       ->where(['vp_product.pro_id'=>$id])
        //       ->get();
       $detail_product = DB::table('vp_product')
              ->join('categories','vp_product.pro_cate','=','categories.cate_id')
              ->select('vp_product.*','categories.*')
              ->where(['vp_product.pro_id'=>$id])
              ->get();

        foreach($detail_product as $value){
            $cate_id =$value->cate_id;
        }
        $data['related_product'] = DB::table('vp_product')
              ->join('categories','vp_product.pro_cate','=','categories.cate_id')
              ->select('vp_product.*','categories.*')
              ->where(['categories.cate_id'=>$cate_id])
              ->whereNotIn('vp_product.pro_id',[$id])
              ->get();
        $motion = DB::table('vp_product')
              ->join('vp_promotions','vp_product.pro_promotion','=','vp_promotions.prom_id')
              ->select('vp_product.*','vp_promotions.*')
              ->where(['vp_product.pro_id'=>$id])
              ->get();
        $data['item'] = Product::find($id);
        $data['sizes'] = Size::all();
        //$productDetails = Product::with('attributes')->where(['pro_id'=>$id])->first();
       
        $data['brand'] = Brand::where('brand_status',1)->orderBy('brand_id','desc')->get();
        return view('fontend.detail_product',$data,['comment'=>$comment],['detail_product'=>$detail_product])->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','motion'));;
    }
    
    public function list_product(Request $request,$id,$slug)
    {
       
        $data['cateName'] = Category::find($id);
        $cate = DB::table('vp_product')
            ->join('categories','vp_product.pro_cate','=','categories.cate_id')
            ->where('categories.cate_slug',$slug)
            ->get();
        foreach($cate as $seo){
            $meta_desc =$seo->cate_desc;
            $meta_keywords=$seo->meta_keywords;
            $meta_title =$seo->cate_name;
            $url_canonical = $request->url();
        }
        if($request->orderby){
            $orderby = $request->orderby;
            switch($orderby)
            {
                case 'desc':
                    $data['items'] = Product::where('pro_cate',$id)->orderBy('pro_id','desc');
                break;
                case 'asc':
                    $data['items'] = Product::where('pro_cate',$id)->orderBy('pro_Gia','asc');
                break;
                case 'price_max':
                    $data['items'] = Product::where('pro_cate',$id)->orderBy('pro_Gia','asc');
                break;
                case 'price_min':
                    $data['items'] = Product::where('pro_cate',$id)->orderBy('pro_Gia','desc');
                break;  

            }
        }
        $data['items'] = Product::where('pro_cate',$id)->orderBy('pro_id','desc')->paginate(3);
        return view('fontend.list_product',$data)->with(compact('cate','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function trademark(Request $request,$id)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $data['Thuonghieu']= Brand::find($id);
        $data['items'] = Product::where('pro_Thuonghieu',$id)->orderBy('pro_id','desc')->paginate(3);
        return view('fontend.trademark',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function postComment(Request $request,$id)
    {
        $comment = new Comment;
        $comment->com_product = $id;
        $comment->com_user = Auth::user()->id;
        $comment->com_content = $request->content;
        $comment->save();
        return redirect("/detail/{$id}");

    }
    public function getSearch(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        $result = $request->result;
        $data['keyword']=$result;
        $result = str_replace('','%',$result);
        $data['items'] = Product::where('pro_Tensanpham', 'like', '%' .$result. '%')->get();
        return view('fontend.search',$data)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function getCart()
    {
        return view('fontend.carts');
    }
    public function getContact(Request $request)
    {
        $meta_desc ='';
        $meta_keywords='';
        $meta_title ='';
        $url_canonical = $request->url();
        return view('fontend.contact')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'min:3',
            'message' =>'min:10'
        ]);
       
        $data =array(
            'email' =>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        );
        Mail::send('email.contact',$data, function($message) use ($data){
               $message->from($data['email']);
               $message->to('lesang0169@gmail.com');
               $message->subject($data['subject']);
        });
        return back();
    }

}
