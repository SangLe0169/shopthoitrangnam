<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table ='vp_orders';
    protected $primaryKey = 'or_id';
    protected $guarded = [];
}
