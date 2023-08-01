<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumKategoriGaleri extends Model
{
    use HasFactory;

    protected $table = 'forum_kategori_galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
    ];

    public function galeri()
    {
        return $this->hasMany(ForumGaleri::class, 'id_kategori_galeri', 'id');
    }
}
