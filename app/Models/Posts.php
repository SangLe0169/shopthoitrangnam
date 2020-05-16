<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table ='vp_posts';
    protected $primaryKey = 'pos_id';
    protected $guarded = [];
}
