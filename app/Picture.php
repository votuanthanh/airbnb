<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    protected $fillable = [
    	'name',
    ];

    public function places()
    {
   		return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
