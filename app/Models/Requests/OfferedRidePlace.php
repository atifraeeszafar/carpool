<?php

namespace App\Models\Requests;

use App\Models\User;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request\OfferedRidePlaceStop;
use App\Models\Requests\OfferRideCustomerRequest;
use App\Models\Request\OfferedRidePlaceFrequentDay;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class OfferedRidePlace extends Model
{
    use HasActive,SpatialTrait;
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
    protected $fillable = ['active','rider_id','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng','start_time','no_of_seats','no_of_seats_occupied','date','coordinates','is_cancelled_by_rider'];

    protected $spatialFields = [
        'coordinates'
    ];
    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'riderInfo','offeredRideCustomerRequest','offeredRidePlaceFrequentDays','offeredRidePlaceStops','offeredRidePlaceStops.offeredRideCustomerRequest'
    ];

    public function offeredRidePlaceStops()
    {
        return $this->hasMany(OfferedRidePlaceStop::class, 'ride_place_id', 'id');
    }
    public function offeredRidePlaceFrequentDays()
    {
        return $this->hasMany(OfferedRidePlaceFrequentDay::class, 'ride_place_id', 'id');
    }
    public function offeredRideCustomerRequest()
    {
        return $this->hasMany(OfferRideCustomerRequest::class, 'ride_place_id', 'id');
    }

    public function riderInfo()
    {
        return $this->belongsTo(User::class, 'rider_id', 'id');
    }
}
