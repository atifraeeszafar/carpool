<?php

namespace App\Models\Common;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Types;
use Nicolaslopezj\Searchable\SearchableTrait;

class CarModel extends Model
{
    use HasActive,SearchableTrait;
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
    protected $fillable = ['make_id','name','active','vehicle_type'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'makeDetail','type'
    ];

    protected $searchable = [
		
		'columns' => [
			'name'=>10,
		]
	
    ];

    public function makeDetail()
    {
        
        return $this->belongsTo(CarMake::class, 'make_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Types::class, 'vehicle_type','id');
    }

  

    
}
