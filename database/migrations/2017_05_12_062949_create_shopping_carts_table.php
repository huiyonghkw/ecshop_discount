<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品ID');
            $table->unsignedSmallInteger('quantity')->default(0)->comment('商品数量');
            $table->unsignedMediumInteger('price')->default(0)->comment('单价，单位：分');
            $table->unsignedInteger('discount_id')->default(0)->comment('折扣ID');
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
        Schema::dropIfExists('shopping_carts');
    }
}
