<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_customer', function (Blueprint $table) {
            $table->increments('cus_id');
            $table->string('cus_Hokhachhang');
            $table->string('cus_Tenkhachhang');
            $table->string('cus_Sodienthoai');
            $table->string('cus_Diachi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_customer');
    }
}
