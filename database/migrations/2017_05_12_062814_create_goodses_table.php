<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->default('')->comment('商品名称');
            $table->string('description', 191)->default('')->comment('商品描述');
            $table->string('barcode', 64)->default('')->comment('条形码');
            $table->unsignedMediumInteger('price')->default(0)->comment('单价，单位：分');
            $table->unsignedInteger('goods_attribute_id')->default(0)->comment('商品属性编号');
            $table->unsignedInteger('goods_category_id')->default(0)->comment('商品类型ID');
            $table->unique('barcode');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goodses');
    }
}
