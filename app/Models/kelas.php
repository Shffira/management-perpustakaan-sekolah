<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'namaKelas',
        'tingkat',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}