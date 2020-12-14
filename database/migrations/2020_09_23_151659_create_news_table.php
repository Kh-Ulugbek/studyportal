<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('title_uz')->nullable();
            $table->string('description');
            $table->string('description_en')->nullable();
            $table->string('description_uz')->nullable();
            $table->string('image');
            $table->text('text');
            $table->text('text_en')->nullable();
            $table->text('text_uz')->nullable();
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
        Schema::dropIfExists('news');
    }
}
