<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table ='vp_brand';
    protected $primaryKey = 'brand_id';
    protected $guarded = [];
}
