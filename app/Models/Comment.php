<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
        'comment_id'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    //Tiene likes y comentarios (los llamaremos replies)
    public function likes(): MorphToMany
    {
        return $this->morphToMany(Like::class, 'likeable');
    }

    public function replies(): MorphToMany
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    //Pertenece a posts y a comentarios
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'commentable');
    }

    public function comments(): MorphToMany
    {
        return $this->morphedByMany(Comment::class, 'commentable');
    }
}
