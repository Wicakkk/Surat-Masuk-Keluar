<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    protected $table = 'klasifikasi_surat';
    protected $primaryKey = "id";
    protected $fillable = ["kode_klasifikasi","nama_klasifikasi"];

    public function klasifikasiSurat(){
        return $this->belongsTo(SuratMasuk::class, 'klasifikasi_surat_id');
    }

}

