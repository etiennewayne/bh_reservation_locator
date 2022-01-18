<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookBedrooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_bedrooms', function (Blueprint $table) {
            $table->id('book_bedroom_id');
            $table->unsignedBigInteger('bedroom_id');
            $table->foreign('bedroom_id')->references('bedroom_id')->on('bedrooms');
            $table->unsignedBigInteger('book_user_id');
            $table->foreign('book_user_id')->references('user_id')->on('users');
            $table->date('book_date')->nullable();
            $table->double('book_price')->default(0);
            $table->tinyInteger('is_active')->default(1);

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
        Schema::dropIfExists('book_bedrooms');
    }
}
