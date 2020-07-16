<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Posts_detail;
use App\Http\Requests\AddPostsRequest;


class PostsController extends Controller
{
    //
    public function getPosts(){
          $data['poslist'] = Posts::all();
          return view('backend.posts',$data);
    }
    public function postPosts(AddPostsRequest $request){
        $filename =$request->img->getClientOriginalName();
        $vp_posts = new Posts;
        $vp_posts->pos_id = $request->mabaiviet;
        $vp_posts->pos_Tieudebaiviet = $request->tieude;
        $vp_posts->pos_content = $request->description;
        $vp_posts->pos_content_detail = $request->descriptions;
        $vp_posts->pos_image = $filename;
        $request->img->storeAs('avatar',$filename);
        $vp_posts->pos_Ngaytao = $request->date;
        $vp_posts->save();
        return back();
    }
    public function getEdit($id)
    {
        $data['posts'] = Posts::find($id);
        return view('backend.editposts',$data);
    }
    public function postEdit(Request $request,$id)
    {
        $vp_posts = new Posts;
        $arr['pos_Tieudebaiviet'] = $request->tieude;
        //$arr['pos_Noidungbaiviet'] = $request->description;
        $arr['pos_content'] = $request->description;
        $arr['pos_content_detail'] = $request->descriptions;
        if($request->hasFile('img')){
            $filename =$request->img->getClientOriginalName();
            $arr['pos_image'] = $filename;
            $request->img->storeAs('avatar',$filename);
        }
        $vp_posts::where('pos_id',$id)->update($arr);
        return redirect('admin/posts');

    }
   
   

   
    // public function postEdit_postdetail(Request $request,$id)
    // {
    //     $posts_detail = new Posts_detail;
    //     //$arr['posts_id'] = $request->mabaiviet;
    //     $arr['pos_title'] = $request->tieude;
    //     $arr['pos_content'] = $request->description;
    //     $arr['pos_content_detail'] = $request->descriptions;
    //     if($request->hasFile('img')){
    //         $filename =$request->img->getClientOriginalName();
    //         $arr['pos_image'] = $filename;
    //         $request->img->storeAs('avatar',$filename);
    //     }
    //     $posts_detail::where('pos_detail',$id)->update($arr);
    //     return redirect('admin/posts_detail');
    // }
    public function getDeletePosts($id)
    {
        Posts::destroy($id);
        return back();
    }

}
