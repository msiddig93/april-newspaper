<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articales', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('writer_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->longText('content');
            $table->boolean('archived')->default(false);
            $table->date('publish_at')->nullable();
            $table->date('archived_at')->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);

            $table->foreign('writer_id')->references('id')
                ->on('writers')->onDelete('set null');
            $table->foreign('department_id')->references('id')
                ->on('departments')->onDelete('set null');

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
        Schema::dropIfExists('articales');
    }
}
