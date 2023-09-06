<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kluster extends Model
{
    use HasFactory;

    protected $table = "kluster";

    protected $fillable = [
        "kluster",
        "title",
        "subtitle",
        "logo",
        "foto",
        "description",
    ];

    public function artikel()
    {
        return $this->hasMany(ArtikelKluster::class);
    }
}