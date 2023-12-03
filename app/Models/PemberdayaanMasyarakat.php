<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemberdayaanMasyarakat extends Model
{
    use HasFactory;

    protected $table = "pemberdayaan_masyarakat";

    protected $fillable = [
        "judul",
        "deskripsi",
        "file",
        "link"
    ];
}
