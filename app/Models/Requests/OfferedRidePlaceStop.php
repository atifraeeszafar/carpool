<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['active','ride_place_id','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng','coordinates','price'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];

    public function offeredRidePlace()
    {
        return $this->belongsTo(OfferedRidePlace::class, 'ride_place_id', 'id');
    }
}
