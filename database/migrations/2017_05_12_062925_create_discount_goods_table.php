<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('discount_id')->default(0)->comment('折扣ID');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品ID');
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
        Schema::dropIfExists('discount_goods');
    }
}
