<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;

class Kantor extends Model
{
    use HasFactory;
    protected $table = 'kantor';
    protected $guarded = [];

    protected $primaryKey = 'id';

    public function kecamatanKantor()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'code', 'code');
    }

    public function kelurahanKantor()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'code', 'code');
    }
}
