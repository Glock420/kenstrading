<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('rentid');
            $table->unsignedBigInteger('custid');
            $table->unsignedBigInteger('carid');
            $table->date('rental_start');
            $table->date('rental_expire');
            $table->longText('description');
            $table->timestamps();

            $table->foreign('custid')->references('custid')->on('customers');
            $table->foreign('carid')->references('carid')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
};
