<?php

namespace App\Models\Admin;

use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ServiceLocation;

class Types extends Model {

	use HasActive;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'vehicle_types';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'base_price', 'distance_price','time_price','icon'
	];

	/**
	 * The relationships that can be loaded with query string filtering includes.
	 *
	 * @var array
	 */
	public $includes = [
		
	];

	public $appends = [
		'icon_image'
	];

	public function getIconImageAttribute(){
		if(empty($this->image)){
			return null;
		}
		return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $this->image));
	}

	
	public function uploadPath() {
		return config('base.types.upload.images.path');
	}

}
