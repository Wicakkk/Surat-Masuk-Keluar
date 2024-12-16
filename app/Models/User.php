<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Bagian; // Import model Bagian

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = "users";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'level', 'file', 'bagian_id', // Tambahkan bagian_id ke dalam fillable
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi dengan model Bagian
    public function bagian()
    {
        return $this->belongsTo(BagianSurat::class, 'bagian_id','id'); // Relasi belongsTo ke model Bagian
    }

    public function bagianSurat()
    {
        return $this->belongsTo(BagianSurat::class, 'bagian_id', 'id');  // Menyebutkan foreign key 'bagian_id' dan primary key 'id'
    }
}
