<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table ='vp_customer';
    protected $primaryKey = 'cus_id';
    protected $guarded = [];
}
