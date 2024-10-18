<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumArtikel extends Model
{
    use HasFactory;

    protected $table = 'forum_artikel';

    protected $fillable = [
        "id_kategori_artikel",
        "kelurahan_id",
        "foto",
        "thumbnail",
        "judul",
        "slug",
        "isi"
    ];

    public function kategori()
    {
        return $this->belongsTo(ForumKategoriArtikel::class, 'id_kategori_artikel', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
