<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanSurat extends Model
{
    protected $table = 'tujuan_surat';
    protected $primaryKey = "id";
    protected $fillable = ["kode_tujuan","keterangan"];

    public function tujuanSurat(){
        return $this->belongsTo(SuratMasuk::class, 'tujuan_surat_id');
    }

}
