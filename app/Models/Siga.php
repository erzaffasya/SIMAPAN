<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siga extends Model
{
    use HasFactory;

    protected $table = "siga";

    protected $fillable = [
        "judul",
        "deskripsi",
        "file",
        "siga_jenis_id"
    ];
    
    public function sigajenis()
    {
        return $this->belongsTo(SigaJenis::class, "siga_jenis_id", "id");
    }
}
