<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_product', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_Tensanpham');
            $table->string('pro_Thuonghieu');
            $table->integer('pro_Gia');
            $table->string('pro_Hinhanh');
            $table->integer('pro_Giamgia');
            $table->string('pro_Khuyenmai');
            $table->string('pro_Nhommau');
            $table->integer('pro_Kichthuoc');
            $table->integer('pro_Soluong');
            $table->text('pro_Mota');
            $table->tinyInteger('pro_Trangthai');
            $table->integer('pro_cate')->unsigned();
            $table->foreign('pro_cate')
                  ->references('cate_id')
                  ->on('categories')
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
        Schema::dropIfExists('vp_product');
    }
}
