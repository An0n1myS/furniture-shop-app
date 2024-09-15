<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('count')->unsigned();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');

            $table->unique(['order_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
