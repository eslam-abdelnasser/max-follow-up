<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general-setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->text('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->text('google_analytics_script')->nullable();
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
        Schema::dropIfExists('general-setting');
    }
}
