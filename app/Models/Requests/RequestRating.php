<?php

namespace App\Models\Requests;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requests\OfferedRidePlace;
use App\Models\Request\OfferedRidePlaceStop;
use App\Models\Traits\HasActive;

class RequestRating extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'request_ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','offered_ride_place_id','user_id','rider_id','rating','comment','user_rating','rider_rating'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
    ];

    // public function offeredRidePlace()
    // {
    //     return $this->belongsTo(OfferedRidePlace::class, 'ride_place_id', 'id');
    // }
    
}
