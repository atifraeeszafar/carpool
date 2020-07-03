<?php

namespace App\Models\Admin;

use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ServiceLocation;

class AdminDetail extends Model {
	use HasActive, UuidModel;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'admin_details';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'address', 'country','state','city','pincode','email','mobile','user_id','created_by','service_location_id'
	];

	/**
	 * The relationships that can be loaded with query string filtering includes.
	 *
	 * @var array
	 */
	public $includes = [
		
	];


	public function user(){
		return $this->belongsTo(User::class,'user_id','id');
	}

	public function serviceLocationDetail(){
		return $this->belongsTo(ServiceLocation::class,'service_location_id','id');
	}


}
