<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191)->default('')->comment('折扣标题');
            $table->string('description', 191)->default('')->comment('折扣描述');
            $table->unsignedTinyInteger('priority')->default(0)->comment('折扣优先级');
            $table->timestamp('start_at')->comment('开始时间');
            $table->timestamp('end_at')->comment('结束时间');
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
        Schema::dropIfExists('discounts');
    }
}
