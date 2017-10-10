<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_descriptions', function (Blueprint $table) {
            $table->increments('id');$table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->integer('lang_id')->unsigned();
            $table->integer('career_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('careers')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('career_descriptions');
    }
}
