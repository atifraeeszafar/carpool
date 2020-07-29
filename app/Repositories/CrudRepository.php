<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\CrudRepositoryInterface;

class CrudRepository implements CrudRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {

        $record = $this->model->find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id,$columns = ['*'])
    {
        return $this->model->findOrFail($id,$columns);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function paginate($perPage = 10,$columns = ['*'])
	{
		return $this->model->paginate($perPage, $columns);
    }
    
    // create a new record in the database

    public function changeToggleState($id,$column_name){

        $record = $this->model->find($id);
       
        $value = 0;
        if(!$record->{$column_name}){
            $value = 1;
        }
        $data=[ $column_name => $value ];

        
        return $this->model->where('id',$id)->update($data);

    
    }


    public function changeOrderStatus($id,$column_name,$value){

        $data=[ $column_name => $value ];

        
        return $this->model->where('id',$id)->update($data);

    
    }

}