<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    use HasActive, UuidModel,SoftDeletes;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'user_details';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id','name','mobile','email','address','state','city','country','gender','active','currency','profile','token','token_expiry'
	];

}
