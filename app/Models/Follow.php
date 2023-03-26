<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Follow extends Model
{
    use HasFactory;

    //Pertenece a un usuario
    public function follower()
    {
        return $this->belongsTo(User::class);
    }


       /**
     * Comunidades seguidas
     */
    public function communities_followed(): MorphToMany
    {
        return $this->morphedByMany(Community::class, 'followable');
    }
 
    /**
     * Perfiles seguidos
     */
    public function users_followed(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'followable');
    }
}
