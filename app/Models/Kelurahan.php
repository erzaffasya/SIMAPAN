<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';

    protected $fillable = [
        'id',
        'nama',
        'created_at',
        'updated_at',
    ];

    public function forumPengurus()
    {
        return $this->hasMany(ForumPengurus::class);
    }
}
