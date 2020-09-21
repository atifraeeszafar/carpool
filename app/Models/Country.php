<?php

namespace App\Models;

use App\Base\Slug\HasSlug;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasActive;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dial_code',
        'code',
        'active'
    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'name',
    ];

    public $appends = [
		'flag_path'
    ];
    
    /**
     * Get all the countries from the JSON file.
     *
     * @return array
     */
    public static function allJSON()
    {
        $route = dirname(dirname(__FILE__)) . '/Helpers/Countries/CountryCodes.json';
        return json_decode(file_get_contents($route), true);
    }
    
    public function getFlagPathAttribute(){
		if(empty($this->flag)){
			return null;
		}
		return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $this->flag));
	}

	/**
	 * The default file upload path.
	 *
	 * @return string|null
	 */
	public function uploadPath() {
		return config('base.country.upload.flag.path');
	}
    
}
