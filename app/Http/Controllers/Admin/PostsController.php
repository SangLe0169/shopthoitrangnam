<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
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
         $vp_posts->pos_Mabaiviet = $request->mabaiviet;
         $vp_posts->pos_Tieudebaiviet = $request->tieude;
         $vp_posts->pos_Noidungbaiviet = $request->description;
         $vp_posts->pos_Hinhanh = $filename;
         $vp_posts->pos_Ngaytao = $request->date;
         $vp_posts->save();
         $request->img->storeAs('avatar',$filename);
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
        $arr['pos_Mabaiviet'] = $request->mabaiviet;
        $arr['pos_Tieudebaiviet'] = $request->tieude;
        $arr['pos_Noidungbaiviet'] = $request->description;
        if($request->hasFile('img')){
            $filename =$request->img->getClientOriginalName();
            $arr['pos_Hinhanh'] = $filename;
            $request->img->storeAs('avatar',$filename);
        }
        $vp_posts::where('pos_id',$id)->update($arr);
        return redirect('admin/posts');

    }
    public function getDeletePosts()
    {
        Posts::destroy($id);
        return back();
    }

}
