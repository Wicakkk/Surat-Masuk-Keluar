<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "surat_masuk";
    protected $primaryKey = "id"    ;
    protected $fillable = [
        'jenis_surat_id',
        'klasifikasi_surat_id',
        'tgl_surat',
        'no_surat',
        'pengirim',
        'perihal',
        'file',
        'bagian_id'
    ];

    public function jenisSurat(){
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function klasifikasiSurat(){
        return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_surat_id');
    }
}
