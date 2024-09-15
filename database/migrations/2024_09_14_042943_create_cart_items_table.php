<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('count')->unsigned();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');

            $table->unique(['cart_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
