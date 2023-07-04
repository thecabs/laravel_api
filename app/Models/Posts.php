<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Contracts\Likeable;
use App\Models\Concerns\Likes; 

 


class Posts extends Model implements Likeable
{
     
    use HasFactory,Sluggable,Likes;

    public function likes(){
        return $this->morphMany(Comment::class,'like');
    }
    protected $fillable = [
        "slug","content"
    ];


    public function sluggable(): array
    {
      
        return [
            'slug' => [
                'source' => 'content'
            ]
        ];
    }
     
    public function posts()
    {
        return $this->belongsTo(Posts::class, 'id');
    }


    
}
