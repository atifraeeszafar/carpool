<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Model;

class OfferedRidePlaceFrequentDay extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offered_place_frequent_days';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active','available_days','to_be_cancelled_at','ride_place_id'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];
}
