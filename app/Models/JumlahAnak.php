<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahAnak extends Model
{
    use HasFactory;

    protected $table = "jumlah_anak";

    protected $fillable = [
        'perempuan',
        'laki-laki'
    ];

}