<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_shopping_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->default(0)->comment('商品ID');
            $table->unsignedInteger('shopping_cart_id')->default(0)->comment('购物车ID');
            $table->unsignedSmallInteger('quantity')->default(0)->comment('数量');
            $table->unsignedSmallInteger('free_quantity')->default(0)->comment('免费赠送数量');
            $table->unsignedInteger('discount_id')->default(0)->comment('折扣ID');
            $table->unsignedMediumInteger('total_amount')->default(0)->comment('总金额，单位：分');
            $table->unsignedMediumInteger('save_amount')->default(0)->comment('节省金额，单位：分');
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
        Schema::dropIfExists('goods_shopping_cart');
    }
}
