<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPengasuhAnak extends Model
{
    use HasFactory;

    protected $table = "layanan_pengasuh_anak";

    protected $fillable = [
        "tahun",
        "indoor",
        "outdoor",
        "online",
    ];
}
