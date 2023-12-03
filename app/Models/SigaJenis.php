<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SigaJenis extends Model
{
    
    use HasFactory;

    protected $table = "siga_jenis";

    protected $fillable = [
        "judul",
        "deskripsi"
    ];

    public function siga()
    {
        return $this->hasMany(Siga::class);
    }
}
