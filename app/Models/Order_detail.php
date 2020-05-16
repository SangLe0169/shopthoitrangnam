<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    protected $table ='vp_orders_detail';
    protected $primaryKey = 'detail_id';
    protected $guarded = [];
}
