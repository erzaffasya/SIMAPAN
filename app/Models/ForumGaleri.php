<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumGaleri extends Model
{
    use HasFactory;

    protected $table = 'forum_galeri';

    protected $fillable = [
        "id_kategori_galeri",
        "thumbnail",
        "foto",
        "judul",
        "isi",
    ];

    public function kategori()
    {
        return $this->belongsTo(ForumKategoriGaleri::class, 'id_kategori_galeri', 'id');
    }

}
