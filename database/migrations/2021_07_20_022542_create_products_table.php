<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('manu_id');
            $table->foreign('manu_id')->references('id')->on('manufactures');
            $table->unsignedInteger('protype_id');
            $table->foreign('protype_id')->references('id')->on('protypes');
            $table->string('name');
            $table->string('pro_image');
            $table->string('origin');#xuất xứ
            $table->integer('price');#giá bán ban đầu
            $table->integer('promotion_price');# giá ưu đãi
            $table->string('description',2000);# mô tả chi tiết  
            $table->integer('feature');
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
        Schema::dropIfExists('products');
    }
}
