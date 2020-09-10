<?php

namespace App\Models\Requests;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requests\OfferedRidePlace;
use App\Models\Request\OfferedRidePlaceStop;
use App\Models\Traits\HasActive;

class OfferRideCustomerRequest extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offered_ride_customer_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active','ride_place_id','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng','offered_place_stops_id','no_of_seats_requested','is_accepted','is_rejected','accepted_at','rejected_at','is_cancelled_by_user','user_id','requested_date','requested_time','cancelled_at'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'user','offeredRidePlace','offeredRidePlaceStop','passengerInfo'
    ];

    public function offeredRidePlace()
    {
        return $this->belongsTo(OfferedRidePlace::class, 'ride_place_id', 'id');
    }
    public function passengerInfo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function offeredRidePlaceStop()
    {
        return $this->belongsTo(OfferedRidePlaceStop::class, 'offered_place_stops_id', 'id');
    }
    
}
