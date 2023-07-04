<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Beats extends Model
{
    use HasFactory,Sluggable;

    public function likes(){
        return $this->morphMany(Comment::class,'like');
    }

    protected $fillable = [
       "id","slug","title","premium_file","free_file"
    ];


    public function sluggable(): array
    {
      
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
     
    public function beats()
    {
        return $this->belongsTo(Beats::class, 'id');
    }
    protected $hidden = [
        'premium_file',
    ];
}
