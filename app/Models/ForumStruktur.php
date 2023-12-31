<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumStruktur extends Model
{
    use HasFactory;

    protected $table = 'forum_struktur';

    protected $fillable = [
        'foto',
        'deskripsi'
    ];
}