<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Обновляем внешний ключ для таблицы orders (связан с users)
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->dropForeign(['delivery_id']);
            $table->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onDelete('cascade');

            $table->dropForeign(['payment_id']);
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onDelete('cascade');
        });

        // Обновляем внешний ключ для таблицы order_items (связан с orders и products)
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });

        // Обновляем внешний ключ для таблицы cart_items (связан с carts и products)
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');

            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });

        // Обновляем внешний ключ для таблицы photos (связан с products)
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['gallery_id']);
            $table->foreign('gallery_id')
                ->references('id')
                ->on('galleries')
                ->onDelete('cascade');
        });

        // Обновляем внешний ключ для таблицы gallery (связан с products)
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Возвращаем внешние ключи без каскадного удаления
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->dropForeign(['payment_id']);
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onDelete('restrict');

            $table->dropForeign(['delivery_id']);
            $table->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onDelete('restrict');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');

            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('restrict');

            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['gallery_id']);
            $table->foreign('gallery_id')
                ->references('id')
                ->on('galleries')
                ->onDelete('restrict');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict');
        });

    }
};
