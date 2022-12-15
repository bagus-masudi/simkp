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
        Schema::create('approve1_booking_vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_vehicle_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('jabatan');
            $table->string('approve');
            $table->timestamps();

            $table->foreign('booking_vehicle_id')->references('id')->on('booking_vehicles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approve1_booking_vehicles');
    }
};
