<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageEducationLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image-education-level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url')->nullable();
            $table->integer('education_level_id')->unsigned();
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
        Schema::dropIfExists('image-education-level');
    }
}
