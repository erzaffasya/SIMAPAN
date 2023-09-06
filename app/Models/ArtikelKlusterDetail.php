<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelKlusterDetail extends Model
{
    use HasFactory;

    protected $table = "artikel_kluster_detail";
    protected $fillable = [
        "artikel_kluster_id",
        "foto",
        "title",
        "subtitle",
        "description",
    ];

    public function artikel()
    {
        return $this->belongsTo(ArtikelKluster::class, 'artikel_kluster_id', 'id');
    }
}