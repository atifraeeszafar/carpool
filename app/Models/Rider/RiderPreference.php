<?php

namespace App\Models\Rider;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RiderPreference extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rider_preferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rider_id','preference_id','answer_id'];


    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'riderInfo'
    ];

    public function riderInfo()
    {
        return $this->belongsTo(User::class, 'rider_id', 'id');
    }
}
