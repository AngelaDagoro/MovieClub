<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function movie()
    {
    	return $this->belongsToMany(Movie::class, 'movie_actor')->withPivot([
            'id',
            'actor_id',
            'movie_id'
        ]);
    }

    public function actorm(){
        return $this->hasMany('App\Actormovie', 'actor_id');
    }
}
