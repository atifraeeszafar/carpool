<?php

namespace App\Models\Requests;

use Illuminate\Database\Eloquent\Model;

class OfferedRidePlace extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offered_ride_places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active','rider_id','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng','start_time','no_of_seats','no_of_seats_occupied','date','coordinates'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];

    public function offeredRidePlaceStops()
    {
        return $this->hasMany(OfferedRidePlaceStop::class, 'ride_place_id', 'id');
    }
    public function offeredRidePlaceFrequentDays()
    {
        return $this->hasMany(OfferedRidePlaceFrequentDay::class, 'ride_place_id', 'id');
    }
}
