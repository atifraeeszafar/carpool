<?php

namespace App\Models\Requests;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requests\OfferedRidePlace;
use App\Models\User;

class OfferedRidePlaceStop extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offered_place_stops';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start_at','end_at','active','ride_place_id','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng','coordinates','price'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'riderInfo'
    ];

    public function offeredRidePlace()
    {
        return $this->belongsTo(OfferedRidePlace::class, 'ride_place_id', 'id');
    }

    public function offeredRideCustomerRequest()
    {
        return $this->hasMany(OfferRideCustomerRequest::class, 'offered_place_stops_id', 'id');
    }

    public function riderInfo()
    {
        return $this->belongsTo(User::class, 'rider_id', 'id');
    }
}
