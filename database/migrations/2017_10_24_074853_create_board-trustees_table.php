<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardTrusteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board-trustees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('tweeter_url')->nullable();
            $table->string('google_plus_url')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('years')->nullable();
            $table->enum('status',[0,1]);
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
        Schema::dropIfExists('board-trustees');
    }
}
