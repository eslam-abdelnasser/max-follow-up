<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider-description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_first')->nullable();
            $table->string('title_second')->nullable();
            $table->text('description')->nullable();
            $table->integer('slider_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('slider-description');
    }
}
