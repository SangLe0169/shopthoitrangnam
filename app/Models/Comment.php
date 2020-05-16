<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table ='vp_comment';
    public function product()
    {
        return $this->belongsTo('App\Models\Product','com_product','com_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','com_user','com_id');
    }
    public function comments()
	{
 	       return $this->hasMany(Comment::class,'com_id');
     }
     public function childrenComments()
	{
       return $this->hasMany(Comment::class,'com_id')->with('childrenComments')->with('user');
	}


}
