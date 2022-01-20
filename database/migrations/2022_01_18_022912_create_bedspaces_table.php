<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedspaces', function (Blueprint $table) {
            $table->id('bedspace_id');
            $table->unsignedBigInteger('bhouse_id');
            $table->foreign('bhouse_id')->references('bhouse_id')->on('boarding_houses');
            $table->string('bedspace_name')->nullable();
            $table->text('bedspace_desc')->nullable();
            $table->string('bedspace_img_path')->nullable();
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
        Schema::dropIfExists('bedspaces');
    }
}