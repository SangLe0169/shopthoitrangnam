<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpOrdersDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_orders_detail', function (Blueprint $table) {
            $table->increments('detail_id');
            $table->float('detail_Đonvigia');
            $table->integer('detail_Soluong');
            $table->integer('detail_Product')->unsigned();
            $table->foreign('detail_Product')
                  ->references('pro_id')
                  ->on('vp_product')
                  ->onDelete('cascade');
            $table->integer('detail_Order')->unsigned();
            $table->foreign('detail_Order')
                  ->references('or_id')
                  ->on('vp_orders')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('vp_orders_detail');
    }
}
