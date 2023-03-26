<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    //PERTENECE A USUARIO Y COMUNIDAD
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    //Puede
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    public function likes(): MorphToMany
    {
        return $this->morphToMany(Like::class, 'likeable');
    }

    
}
