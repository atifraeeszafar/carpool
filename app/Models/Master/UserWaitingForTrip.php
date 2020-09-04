<?php

namespace App\Models\Master;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;

class UserWaitingForTrip extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_waiting_for_trip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','date','start_time','pickup_address','drop_address','pickup_lat','pickup_lng','drop_lat','drop_lng'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        // 'makeDetail'
    ];

    // public function makeDetail()
    // {
    //     return $this->belongsTo(CarMake::class, 'make_id', 'id');
    // }
}
