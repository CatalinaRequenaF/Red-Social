<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Like extends Model
{
    use HasFactory;

    //Pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //Capacidad de post, comentario y comunidad para ser likeados
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }

    public function comments(): MorphToMany
    {
        return $this->morphedByMany(Comment::class, 'likeable');
    }

    public function communities(): MorphToMany
    {
        return $this->morphedByMany(Community::class, 'likeable');
    }
}
