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
        Schema::create('rent_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('no_plat');
            $table->string('merek');
            $table->string('jenis');
            $table->string('tahun');
            $table->date('tgl_berakhir');
            $table->string('tarif');
            $table->string('tempat_sewa');
            $table->string('status_vehicle');
            $table->string('angkutan');
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
        Schema::dropIfExists('rent_vehicles');
    }
};
