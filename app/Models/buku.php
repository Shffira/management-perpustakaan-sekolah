<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class buku extends Model
{
    protected $fillable = [
        'judulBuku',
        'author_id',
        'kategori_id',
        'stock',
    ];
    public function author()
    {
        return $this->belongsTo(author::class);
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
