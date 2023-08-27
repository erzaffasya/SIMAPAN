<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseAnak extends Model
{
    use HasFactory;

    protected $table = "persentase_anak";

    protected $fillable = [
        "tahun",
        "akta_kelahiran",
        "kartu_identitas",
    ];
}
