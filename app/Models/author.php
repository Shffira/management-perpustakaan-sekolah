<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class author extends Model
{
        use HasFactory;

    protected $fillable = [
        'namaAuthor',
    ];

    public function bukus()
    {
        return $this->hasMany(buku::class);
    }
}
