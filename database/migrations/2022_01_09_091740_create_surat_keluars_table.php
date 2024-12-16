<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('noSkeluar');
            $table->date('tglKeluar');
            $table->text('file');
            $table->string('perihal')->nullable();
            $table->integer('bagian_id');
            $table->unsignedBigInteger('tujuan_surat_id')->nullable();
            $table->unsignedBigInteger('jenis_surat_id')->nullable();
            $table->unsignedBigInteger('klasifikasi_surat_id')->nullable();

            $table->foreign('jenis_surat_id')
                  ->references('id')->on('jenis_surat')
                  ->onDelete('cascade');

            $table->foreign('tujuan_surat_id')
                  ->references('id')->on('tujuan_surat')
                  ->onDelete('cascade');

            $table->foreign('klasifikasi_surat_id')
                  ->references('id')->on('klasifikasi_surat')
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
        Schema::dropIfExists('surat_keluar');
    }
}
