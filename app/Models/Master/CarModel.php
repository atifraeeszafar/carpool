<?php

namespace App\Models\Common;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_models';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['make_id','name','active'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'makeDetail'
    ];

    public function makeDetail()
    {
        return $this->belongsTo(CarMake::class, 'make_id', 'id');
    }
}
