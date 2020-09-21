<?php

namespace App\Models\Master;

use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\PreferenceAnswers;

class Preference extends Model
{
    use HasActive;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['question','active'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'preferencesAnswers'
    ];

    public function preferencesAnswers()
    {
        return $this->hasMany(PreferenceAnswers::class, 'preference_id', 'id');
    }
}
