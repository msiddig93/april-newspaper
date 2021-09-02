<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticaleMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articale_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articale_id')->nullable();
            $table->string('path');
            $table->enum('type',['image', 'video'])->default('image');

            $table->foreign('articale_id')->references('id')
                ->on('articales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articale_media');
    }
}
