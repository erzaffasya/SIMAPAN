<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        "slug",
    ];

    protected static function booted()
    {
        static::saving(function ($artikel) {
            if (empty($artikel->slug)) {
                $slug = Str::slug($artikel->title);
                $originalSlug = $slug;

                $count = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = "{$originalSlug}-{$count}";
                    $count++;
                }

                $artikel->slug = $slug;
            }
        });
    }

    public function detail()
    {
        return $this->hasMany(ArtikelKlusterDetail::class, "artikel_kluster_id", "id");
    }

    public function kluster()
    {
        return $this->belongsTo(Kluster::class);
    }
}
