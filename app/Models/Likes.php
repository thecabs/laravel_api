<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function likeable (){
        return $this->morphTo();
    }
}
