<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpFeeship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_feeship', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('fee_matp');
            $table->integer('fee_maqh');
            $table->integer('fee_xaid');
            $table->string('fee_feeship');
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
        Schema::dropIfExists('vp_feeship');
    }
}
