<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahRamahAnak extends Model
{
    use HasFactory;

    protected $table = "sekolah_ramah_anak";

    protected $fillable = [
        "tahun",
        "paud",
        "sd",
        "smp",
        "slta",
        "slb",
        "isaktif"
    ];
}