<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    use HasFactory;

    protected $table = "kebijakan";

    protected $fillable = [
        "judul",
        "deskripsi",
    ];

    public function detail()
    {
        return $this->hasMany(KebijakanDetail::class);
    }
}