<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_posts', function (Blueprint $table) {
            $table->increments('pos_id');
            $table->string('pos_Mabaiviet');
            $table->string('pos_Tieudebaiviet');
            $table->string('pos_Noidungbaiviet');
            $table->string('pos_Hinhanh');
            $table->date('pos_Ngaytao');
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
        Schema::dropIfExists('vp_posts');
    }
}
