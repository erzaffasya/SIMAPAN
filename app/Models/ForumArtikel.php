<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;

class ForumArtikel extends Model
{
    use HasFactory;

    protected $table = 'forum_artikel';

    protected $fillable = [
        "id_kategori_artikel",
        "kelurahan",
        "kecamatan",
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

    public function kelurahanForumArtikel()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'code', 'code');
    }

    public function kecamatanForumArtikel()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'code', 'code');
    }
}
