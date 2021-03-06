<?php

namespace App\Models\Master;


use App\Base\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class CancellationReason extends Model
{
    
    use UuidModel;
    use SearchableTrait;
    use SoftDeletes;

    //
    //protected $fillable=["name","number","created_by","service_location"];
    protected $fillable=["reason","payment_status","status","arrived_state","created_by"];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            
            'reason' => 10,
            
        ],
  
    ];
    public function getFillable()
{
    return $this->fillable;
}


}
