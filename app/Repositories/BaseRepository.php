<?php

namespace App\Repositories;


use App\Exceptions\CustomException;
use App\Repositories\interfaces\CriteriaInterface;
use App\Repositories\interfaces\PresenterInterface;
use App\Traits\CacheHelper;
use App\Traits\CollectionHelper;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

abstract class BaseRepository
{
    use CollectionHelper;
    use CacheHelper;
    
    protected                       $query;
    protected                       $resultSet;
    protected array                 $with      = [];
    protected array                 $hiddens   = [];
    protected array                 $visibles  = [];
    protected array                 $scopes    = [];
    protected array                 $columns   = ['*'];
    protected array                 $sortables = [];
    protected int                   $pageSize  = 20;
    private PresenterInterface      $presenter;
    private CriteriaInterface       $criteria;
    private PresenterInterface|null $tempPresenter;
    private CriteriaInterface|null  $tempCriteria;
    private Boolean                 $skipPresenter;
    private Boolean                 $skipRelations;
    private Boolean                 $skipCriteria;
    private Model                   $model;
    
    public function __construct()
    {
        if (!method_exists($this, 'model')) {
            throw new  CustomException(trans("exception.model_function_not_defined"), 500);
        }
        $this->model = $this->model();
        $this->query = $this->model();
        $this->resetQuery();
    }
    
    public abstract function model()
    : Model;
    
    private function resetQuery()
    {
        $this->query = clone $this->model;
//        if (method_exists($this, 'presenter') && $this->presenter()) {
//            $this->presenter = null;
//        }
//        if (method_exists($this, 'criteria') && $this->criteria()) {
//            $this->criteria = $this->criteria();
//        }
        $this->tempPresenter = null;
        $this->tempCriteria  = null;
    }
    
    public function presenter(PresenterInterface $presenter)
    : self {
        $this->presenter = $presenter;
        
        return $this;
    }
    
    public function criteria(CriteriaInterface $criteria)
    : self {
        $this->criteria = $criteria;
        
        return $this;
    }
    
    public function setCriteria(CriteriaInterface $criteria)
    : void {
        $this->criteria = $criteria;
    }
    
    /**
     * @param  Request|null  $request
     * @param  array  $columnList
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function getAll(Request $request = null, array $columnList = ['*'])
    {
        $this->checkSettings();
        $this->queryModel($columnList, $this->with);
        $this->filter($request);
        $result = $this->query->get();
        $this->manageVisibleHidden($result);
        if (!!$this->getPresenter() && !$this->skipPresenter) {
            $result = $result->map(function ($item) {
                return $this->getPresenter()->transform($item);
            });
        }
        $this->resetQuery();
        
        return $result;
    }
    
    /**
     * @throws CustomException
     */
    private function checkSettings()
    {
        if (!property_exists($this, 'model') || is_null($this->model)) {
            throw new CustomException(trans("exception.model_not_found"), 500);
        }
        if (!method_exists($this, 'getAttributes')) {
            throw new  CustomException(trans("exception.get_attribute_function_not_defined"), 500);
        }
        $this->query = $this->model;
    }
    
    /**
     * @param  array  $columnList
     * @param  array  $relations
     */
    public function queryModel($columnList = ['*'], $relations = [])
    {
        $this->query = $this->query->select($columnList);
        $this->query = $this->manageWithRelations($this->query, $relations);
        $this->applyScopes($this->query);
    }
    
    protected function manageWithRelations($parentQuery, $relations = [])
    {
        $relations = count($relations) ? $relations : $this->with;
        foreach ($relations as $key => $relation) {
            if (is_numeric($key)) {
                $parentQuery = $parentQuery->with($relation);
            } else {
                $parentQuery = $parentQuery->with(array(
                    $key => function ($query) use ($relation) {
                        return $query->select($relation);
                    },
                ));
            }
        }
        
        return $parentQuery;
    }
    
    public function applyScopes(&$query)
    {
        foreach ($this->scopes as $scope) {
            $query->{$scope}();
        }
    }
    
    /**
     * @param  Request  $request
     */
    public function filter(Request $request)
    {
        if (!!$this->getCriteria()) {
            $this->query = $this->getCriteria()->apply($request, $this->query);
        }
    }
    
    private function getCriteria()
    : CriteriaInterface|null
    {
        return $this->tempCriteria ?? $this->criteria ?? null;
    }
    
    private function manageVisibleHidden(&$resultSet)
    {
        if ($this->visibles) {
        } else {
            if ($this->hiddens) {
                $resultSet->makeHidden($this->hiddens);
            }
        }
    }
    
    private function getPresenter()
    : PresenterInterface|null
    {
        return $this->tempPresenter ?: $this->presenter ?? null;
    }
    
    /**
     * @param $parentQuery
     * @param  array  $relations
     * @return mixed
     */
//    public function bindEagerLoading($parentQuery, $relations = [])
    
    /**
     * @param  Request|null  $request
     * @param  array  $columnList
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function getPaginate(Request $request = null, array $columnList = [], array $relations = [])
    {
        $this->checkSettings();
        $this->queryModel($columnList ?: $this->columns, $relations ?: $this->with);
        $this->filter($request);
        $this->paginateModel($request);
        $result = $this->resultSet->getCollection();
        if (!!$this->getPresenter() && !$this->skipPresenter) {
            $result = $result->map(function ($item) {
                return $this->getPresenter()->transform($item);
            });
        }
        $this->resultSet->setCollection($result);
        $this->resetQuery();
        
        return $this->resultSet;
    }
    
    /**
     * @param $query
     */
    private function paginateModel(Request $request)
    {
        $this->resultSet = $this->query->paginate($request->page_size ?: $this->pageSize);
        
        $this->manageVisibleHidden($this->resultSet);
    }
    
    public function getSimplePaginate(Request $request = null, array $columnList = [], array $relations = [])
    {
        $this->checkSettings();
        $this->queryModel($columnList ?: $this->columns, $relations ?: $this->with);
        $this->filter($request);
        $this->simplePaginateModel($request);
        $this->resetQuery();
        
        return $this->resultSet;
    }
    
    private function simplePaginateModel(Request $request)
    {
        $this->resultSet = $this->query->simplePaginate($request->page_size ?: $this->pageSize);
        $this->manageVisibleHidden($this->resultSet);
    }
    
    /**
     * @param  Request  $request
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function create(array $inputData, $relations = [])
    {
        $this->checkSettings();
        $this->query = $this->model;
        $data        = $this->query->create($inputData);
        $data        = $this->bindEagerLoading($data, $relations);
        $this->manageVisibleHidden($data);
        $this->resetQuery();
        
        return $data;
    }
    
    /**
     * @param $parentQuery
     * @param  array  $relations
     * @return mixed
     */
    public function bindEagerLoading($parentQuery, $relations = [])
    {
        $relations = count($relations) ?: $this->with;
        foreach ($relations as $key => $relation) {
            if (is_numeric($key)) {
                $parentQuery = $parentQuery->load($relation);
            } else {
                $parentQuery = $parentQuery->load(array(
                    $key => function ($query) use ($relation) {
                        return $query->select($relation);
                    },
                ));
            }
        }
        
        return $parentQuery;
    }
    
    /**
     * @param  Request  $request
     * @return array
     */
    public function getAttributes(Request $request)
    {
        return $request->all();
    }
    
    /**
     * @param $id
     * @param  array  $columns
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function getById($id, $columns = ['*'], $relations = [])
    {
        $this->checkSettings();
        $query = $this->manageWithRelations($this->query, $relations);
        $this->applyScopes($query);
        $result = $query->findOrFail($id);
        $this->manageVisibleHidden($result);
        $this->resetQuery();
        
        return $result;
    }
    
    /**
     * @param  Request  $request
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function update(array $inputData, $id, $relations = [])
    {
        $this->checkSettings();
        $model = $this->query->where($this->getPrimaryKey(), $id);
        $this->applyScopes($model);
        $model = $model->firstOrFail();
        $model->fill($inputData);
        $model->save();
        $data = $this->bindEagerLoading($model, $relations);
        $this->manageVisibleHidden($data);
        $this->resetQuery();
        
        return $data;
    }
    
    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->model->getKeyName();
    }
    
    /**
     * @param $id
     * @return bool
     * @throws CustomException
     */
    public function delete($id)
    {
        $this->checkSettings();
        $model = $this->query->where($this->getPrimaryKey(), $id);
        $this->applyScopes($model);
        $model = $model->firstOrFail();
        $model->delete();
        $this->resetQuery();
        
        return true;
    }
    
    /**
     * @param $query
     * @param  Request  $request
     * @return mixed
     */
    public function filterRecordsOnCollections(Request $request)
    {
    }
    
    public function skipPresenter()
    : self
    {
        $this->skipPresenter = true;
        
        return $this;
    }
    
    public function skipRelations()
    : self
    {
        $this->skipRelations = true;
        
        return $this;
    }
    
    public function skipCriteria()
    : self
    {
        $this->skipCriteria = true;
        
        return $this;
    }
    
    /**
     * @param  CriteriaInterface  $criteria
     * @return $this
     */
    public function withCriteria(CriteriaInterface $criteria)
    : self {
        $this->criteria = $criteria;
        
        return $this;
    }
    
    /**
     * @param  PresenterInterface  $presenter
     * @return $this
     */
    public function withPresenter(PresenterInterface $presenter)
    : self {
        $this->presenter = $presenter;
        
        return $this;
    }
    
    /**
     * @param  array  $with
     * @return $this
     */
    public function with(array $with)
    : self {
        $this->with = $with;
        
        return $this;
    }
    
    public function columns(array $columns = ['*'])
    : self {
        $this->columns = $columns;
        
        return $this;
    }
    
    public function bulkInsert(array $data)
    : mixed {
        try {
            return $this->model->insert($data);
        } catch (Exception $exception) {
            throw  new CustomException($exception, 500);
        }
    }
    
    /**
     * @param  stirng  $field
     * @param  mixed  $value
     * @param  array  $relations
     * @return mixed
     * @throws CustomException
     */
    public function getByField(string $field, mixed $value, array $relations = [])
    {
        $this->checkSettings();
        $query = $this->manageWithRelations($this->query, $relations);
        $this->applyScopes($query);
        $result = $query->where($field, $value)->get();
        $this->manageVisibleHidden($result);
        $this->resetQuery();
        if (!!$this->getPresenter() && !$this->skipPresenter) {
            $result = $result->map(function ($item) {
                return $this->getPresenter()->transform($item);
            });
        }
        
        return $result;
    }
    
    /**
     * @return mixed
     */
    private function getCacheKey()
    : mixed
    {
        return $this->model->getTable();
    }
}
