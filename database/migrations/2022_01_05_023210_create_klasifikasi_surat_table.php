<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasiSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasi_surat', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->string('kode_klasifikasi')->unique(); // Unique classification code
            $table->string('nama_klasifikasi'); // Name of the classification
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasifikasi_surat');
    }
}
