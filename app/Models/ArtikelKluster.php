<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelKluster extends Model
{
    use HasFactory;

    protected $table = "artikel_kluster";

    protected $fillable = [
        "kluster_id",
        "jenis",
        "urut",
        "title",
        "subtitle",
        "description",
    ];

    public function detail()
    {
        return $this->hasMany(ArtikelKlusterDetail::class, "artikel_kluster_id", "id");
    }

    public function kluster()
    {
        return $this->belongsTo(Kluster::class);
    }
}