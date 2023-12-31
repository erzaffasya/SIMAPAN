<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    protected $table = 'emergency';
    protected $guarded = [];

    protected $primaryKey = 'id';



    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
