<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->string('type_en')->nullable();
            $table->string('type_uz')->nullable();
            $table->string('students')->nullable();
            $table->string('students_en')->nullable();
            $table->string('students_uz')->nullable();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_uz')->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_uz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('universities', function (Blueprint $table) {
            //
        });
    }
}
