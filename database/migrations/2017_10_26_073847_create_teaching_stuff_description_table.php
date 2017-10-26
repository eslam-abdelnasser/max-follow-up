<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingStuffDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching-stuff-description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('description')->nullable();
            $table->string('degree')->nullable();
            $table->string('university')->nullable();
            $table->string('work_as')->nullable();
            $table->integer('teaching_stuff_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teaching_stuff_id')->references('id')->on('teaching-stuff')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('teaching-stuff-description');
    }
}
