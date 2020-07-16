<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('pro_name');
            $table->string('pro_color');
            $table->string('size');
            $table->string('price');
            $table->string('quantity');
            $table->string('user_email');
            $table->string('session_id');
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
        Schema::dropIfExists('vp_cart');
    }
}
