<?php

namespace App\Models\Common;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['color_code','color_name','active'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];
}
