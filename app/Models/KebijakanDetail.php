<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebijakanDetail extends Model
{
    use HasFactory;

    protected $table = "kebijakan_detail";

    protected $fillable = [
        "kebijakan_id",
        "judul",
        "file",
    ];

    public function kebijakan()
    {
        return $this->belongsTo(Kebijakan::class);
    }
}