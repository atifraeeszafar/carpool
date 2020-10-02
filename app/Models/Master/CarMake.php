<?php

namespace App\Models\Common;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class CarMake extends Model
{
    use HasActive,SearchableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_makes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','active'];

    protected $searchable = [
		
		'columns' => [
			'name'=>10,
		]
	
    ];
    
    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'modelDetail'
    ];

    public function modelDetail()
    {
        return $this->hasOne(CarModel::class, 'make_id', 'id');
    }
}
