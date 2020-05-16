<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_orders', function (Blueprint $table) {
            $table->increments('or_id');
            $table->string('or_Makhachhang');
            $table->date('or_Ngaydat');
            $table->date('or_Ngaygiao');
            $table->string('or_Tongtien');
            $table->tinyInteger('or_Trangthai');
            $table->integer('or_Customer')->unsigned();
            $table->foreign('or_Customer')
                  ->references('cus_id')
                  ->on('vp_customer')
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
        Schema::dropIfExists('vp_orders');
    }
}
