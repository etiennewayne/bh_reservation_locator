<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms', function (Blueprint $table) {
            $table->id('bedroom_id');
            $table->unsignedBigInteger('bhouse_id');
            $table->foreign('bhouse_id')->references('bhouse_id')->on('boarding_houses');
            $table->string('bedroom_name')->nullable();
            $table->text('bedroom_desc')->nullable();
            $table->string('bedroom_img_path')->nullable();
            $table->double('price')->default(0);
            $table->tinyInteger('is_booked')->default(0);
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
        Schema::dropIfExists('bedrooms');
    }
}
