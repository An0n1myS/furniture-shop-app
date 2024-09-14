<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('gallery_id');
            $table->string('photo_url', 255);
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries');
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
