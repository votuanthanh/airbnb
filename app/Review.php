<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
    	'text',
    ];

    public function users()
    {
   		return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function places()
    {
   		return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
