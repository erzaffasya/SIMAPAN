<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumKategoriArtikel extends Model
{
    use HasFactory;

    protected $table = 'forum_kategori_artikel';

    protected $fillable = [
        'judul',
        'isi',
    ];

    public function artikel()
    {
        return $this->hasMany(ForumArtikel::class, 'id_kategori_artikel', 'id');
    }
}