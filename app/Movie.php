<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function actor()
    {
    	return $this->belongsToMany(Actor::class, 'movie_actor')->withPivot([
            'id',
            'actor_id',
            'movie_id'
        ]);
    }
    
	public function producer()
    {
    	return $this->belongsTo('App\Producer');
    }

    public function genre()
    {
    	return $this->belongsTo('App\Genre');
    }

    public function moviea(){
        return $this->hasMany('App\Actormovie', 'movie_id');
    }
}
