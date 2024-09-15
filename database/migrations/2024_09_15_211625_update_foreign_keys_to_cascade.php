<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeysToCascade extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropForeign(['collection_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['material_id']);

            $table->foreign('color_id')
                ->references('id')->on('colors')
                ->onDelete('cascade');

            $table->foreign('collection_id')
                ->references('id')->on('collections')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('material_id')
                ->references('id')->on('materials')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropForeign(['collection_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['material_id']);

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('material_id')->references('id')->on('materials');
        });
    }
}
