<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationLevelDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education-level-description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_level')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('education_level_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('education_level_id')->references('id')->on('education-level')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('education-level-description');
    }
}
