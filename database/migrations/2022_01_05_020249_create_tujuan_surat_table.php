<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTujuanSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan_surat', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->string('kode_tujuan')->unique(); // Unique classification code
            $table->string('keterangan'); // Name of the classification
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tujuan_surat');
    }
}
