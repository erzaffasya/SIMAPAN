<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPengurus extends Model
{
    use HasFactory;

    protected $table = 'forum_pengurus';

    protected $fillable = [
        "nama",
        "jabatan",
        "foto",
        "kelurahan_id",
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
