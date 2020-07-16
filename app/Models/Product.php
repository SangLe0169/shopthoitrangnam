<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table ='vp_product';
    protected $primaryKey = 'pro_id';

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','com_product','com_id');
    }
    public function attributes()
    {
        return $this->hasMany('App\Models\Attributes','size_product');
    }
}
