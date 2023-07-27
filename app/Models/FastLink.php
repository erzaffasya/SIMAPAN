<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastLink extends Model
{
    use HasFactory;

    protected $table = "fast_links";

    protected $fillable = [
        "judul",
        "link"
    ];
}