<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilGaleri extends Model
{
    use HasFactory;

    protected $table = 'profil_galeri';

    protected $fillable = [
        "id_kategori_galeri",
        "thumbnail",
        "foto",
        "judul",
        "deskripsi",
    ];

    public function kategori()
    {
        return $this->belongsTo(ProfilKategoriGaleri::class, 'id_kategori_galeri', 'id');
    }
}
