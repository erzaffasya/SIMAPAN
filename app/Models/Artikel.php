<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        "id_kategori",
        "foto",
        "thumbnail",
        "judul",
        "slug",
        "isi"
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori', 'id');
    }
}
