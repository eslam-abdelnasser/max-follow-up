<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardTrusteesDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board-trustees-description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('description')->nullable();
            $table->string('degree')->nullable();
            $table->string('university')->nullable();
            $table->string('work_as')->nullable();
            $table->integer('board_trustees_id')->unsigned();
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('board_trustees_id')->references('id')->on('board-trustees')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('board-trustees-description');
    }
}
