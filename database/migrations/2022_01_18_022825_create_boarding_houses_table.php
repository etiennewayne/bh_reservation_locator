<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->id('bhouse_id');
            $table->string('bhouse_name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('owner')->nullable();
            $table->string('business_permit')->nullable();
            $table->string('business_permit_imgpath')->nullable();
            $table->string('bhouse_img_path')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
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
        Schema::dropIfExists('boarding_houses');
    }
}
