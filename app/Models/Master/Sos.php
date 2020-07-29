<?php

namespace App\Models\Master;


use App\Base\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Sos extends Model
{
    
    use UuidModel;
    use SearchableTrait;
    use SoftDeletes;

    //
    //protected $fillable=["name","number","created_by","service_location"];
    protected $fillable=["name","number","created_by"];

    public function getFillable()
{
    return $this->fillable;
}
}
