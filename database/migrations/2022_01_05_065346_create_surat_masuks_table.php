<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('pengirim');
            $table->string('perihal')->nullable();
            $table->integer('bagian_id');
            $table->text('file');
            $table->unsignedBigInteger('tujuan_surat_id')->nullable();
            $table->unsignedBigInteger('jenis_surat_id')->nullable();
            $table->unsignedBigInteger('klasifikasi_surat_id')->nullable();

            $table->foreign('jenis_surat_id')
                  ->references('id')->on('jenis_surat')
                  ->onDelete('cascade');

            $table->foreign('klasifikasi_surat_id')
                  ->references('id')->on('klasifikasi_surat')
                  ->onDelete('cascade');

            $table->foreign('tujuan_surat_id')
                  ->references('id')->on('tujuan_surat')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
