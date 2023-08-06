<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKategoriGaleri extends Model
{
    use HasFactory;

    protected $table = 'profil_kategori_galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'slug',
        'foto',
        'thumbnail',
    ];

    public function galeri()
    {
        return $this->hasMany(ProfilGaleri::class, 'id_kategori_galeri', 'id');
    }
}
