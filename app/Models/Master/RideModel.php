<?php

namespace App\Models\Common;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\Models\Master\RideJunctionModel;

class RideModel extends Model
{
    use SpatialTrait;

    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ride';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','ride_id_string','rider_id','ride_date_time','no_of_passengers_left','trip_status','coordinates'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'riderDetail','rideJunction'
    ];

    protected $spatialFields = [
        'coordinates',
    ];

    public function riderDetail()
    {
        return $this->hasOne(User::class, 'id', 'rider_id');
    }

    public function rideJunction()
    {
        return $this->hasMany(RideJunctionModel::class, 'ride_id', 'id');
    }

}
