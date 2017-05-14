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
            $table->unsignedSmallInteger('total_goods')->default(0)->comment('商品总数');
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
        Schema::dropIfExists('shopping_carts');
    }
}
