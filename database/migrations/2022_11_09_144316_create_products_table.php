<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->double('price');
            $table->text('image1');
            $table->text('image2')->nullable();
            $table->text('image3')->nullable();
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('authour_id')->nullable();
            $table->foreign('authour_id')->references('id')->on('authours');
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
        Schema::dropIfExists('products');
    }
}
