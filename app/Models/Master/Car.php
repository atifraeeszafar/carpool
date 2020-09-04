<?php

namespace App\Models\Master;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Types;

class Car extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active','number_plate','user_id','car_make','car_model','vehicle_type','car_color','model_year'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];

    public function type()
    {
        return $this->hasOne(Types::class, 'id', 'vehicle_type');
    }
}
