<?php

namespace App\Models\Master;

use App\Base\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Faq extends Model
{
    
    use UuidModel;
    use SearchableTrait;
    use SoftDeletes;

    //
    //protected $fillable=["question","answer","service_location","created_by"];
    protected $fillable=["question","answer","created_by"];
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            
            'question' => 10,
            'answer' => 10,
            
        ],
  
    ];
    public function getFillable()
{
    return $this->fillable;
}
}
