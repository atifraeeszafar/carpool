<?php

namespace App\Models\Master;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\Models\Common\RideModel;

class RideJunctionModel extends Model
{
    use SpatialTrait;

    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ride_junction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','ride_id','pick_up_lat','pick_up_lng','drop_location_lat','drop_location_lng','pick_up_location','drop_location','price','coordinates','status','order'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'ride'
    ];

    protected $spatialFields = [
        'coordinates',
    ];

    public function ride()
    {
        
        return $this->belongsTo(RideModel::class, 'id', 'ride_id');
    }
}
