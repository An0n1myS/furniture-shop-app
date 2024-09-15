<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('delivery_id');
            $table->decimal('order_price', 10, 2);
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
