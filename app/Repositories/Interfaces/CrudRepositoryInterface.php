<?php namespace App\Repositories\Interfaces;

interface CrudRepositoryInterface
{
    public function all(array $column_data);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show(array $column_data,$id);

    public function paginate(array $column_data,$per_page);

    public function changeToggleState($id,$column_name);
    
}