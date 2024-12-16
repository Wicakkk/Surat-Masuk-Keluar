<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianSurat extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'bagian_surat';

    // Menentukan kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'nama_bagian',
    ];

    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class, 'bagian_id', 'id');
    }

}
