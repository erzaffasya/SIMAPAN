<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;

class ForumPengurus extends Model
{
    use HasFactory;

    protected $table = 'forum_pengurus';

    protected $fillable = [
        "nama",
        "jabatan",
        "foto",
        "kelurahan",
        "kecamatan",
        "is_show",
    ];

    public function kelurahanForumPengurus()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'code', 'code');
    }

    public function kecamatanForumPengurus()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'code', 'code');
    }
}
