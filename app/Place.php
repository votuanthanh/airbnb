<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'name',
        'description',
        'number_rooms',
        'number_bathrooms',
        'max_guest',
        'price',
        'latitude',
        'longtitude',
        'status',
    ];

    public function users()
    {
   		return $this->belongsToMany('\App\User');
    }

    public function amenities()
    {
        return $this->hasMany('\App\Amenity');
    }

    public function cities()
    {
   		return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
