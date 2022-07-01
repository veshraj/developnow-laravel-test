<?php

namespace App\Repositories;

use App\Repositories\interfaces\CriteriaInterface;
use App\Repositories\interfaces\PresenterInterface;
use Illuminate\Http\Request;

interface BaseInterface
{
    public function getAll(Request $request = null);
    
    public function getPaginate(Request $request = null);
    
    public function getSimplePaginate(Request $request);
    
    public function create(array $inputData);
    
    public function getById($id, array $columns = ['*']);
    
    public function getByField(string $attribute, mixed $value, array $columns = ['*']);
    
    public function update(array $inputData, mixed $id);
    
    public function delete(mixed $id);
    
    public function getAttributes(Request $request);
    
    public function skipPresenter()
    : BaseRepository;
    
    public function skipRelations()
    : BaseRepository;
    
    
    public function skipCriteria()
    : BaseRepository;
    
    public function setCriteria(CriteriaInterface $criteria)
    : void;
    
    public function presenter(PresenterInterface $presenter)
    : BaseRepository;
    
    
    public function with(array $with)
    : BaseRepository;
    
    
    public function columns(array $columns = ['*'])
    : BaseRepository;
    
    public function bulkInsert(array $data)
    : mixed;
    
}
