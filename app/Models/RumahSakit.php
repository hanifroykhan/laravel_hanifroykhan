<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;

    protected $table = 'rumah_sakit';

    protected $fillable = [
        'nama_rs',
        'alamat_rs',
        'email_rs',
        'telpon_rs'
    ];

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
