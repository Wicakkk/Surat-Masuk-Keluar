<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ="surat_keluar";
    protected $primaryKey = "id";
    protected $fillable = [
        'jenis_surat_id',
        'klasifikasi_surat_id',
        'tglKeluar',
        'noSkeluar',
        'pengirim',
        'tujuan_surat_id',
        'perihal',
        'file'
    ];

    public function jenisSurat(){
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function klasifikasiSurat(){
        return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_surat_id');
    }

    public function tujuanSurat(){
        return $this->belongsTo(TujuanSurat::class, 'tujuan_surat_id');
    }

}
