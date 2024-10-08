<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 32);
            $table->text('description');
            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('material_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('material_id')->references('id')->on('materials');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
