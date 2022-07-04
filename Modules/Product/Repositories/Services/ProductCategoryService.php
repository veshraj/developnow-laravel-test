<?php

namespace Modules\Product\Repositories\Services;

use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;
use Illuminate\Http\Request;

class ProductCategoryService
{
    /**
     * @var  ProductCategoryRepositoryInterface
     */
    protected $repository;
    
    /**
     * ProductCategoryRepository constructor.
     *
     * @param  ProductCategoryRepositoryInterface  $repository
     */
    public function __construct(ProductCategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @param  Request  $request
     *
     * @return  mixed
     */
    public function getList(Request $request)
    {
        return $this->repository->getPaginate($request);
    }
    
    /**
     * @param  mixed  $id
     *
     * @return  mixed
     */
    public function getById(mixed $id)
    {
        return $this->repository->getById($id);
    }
    
    /**
     * @param  Request  $request
     *
     * @return  mixed
     */
    public function create(Request $request)
    {
        return $this->repository->create($request->only('name'));
    }
    
    /**
     * @param  array  $inputData
     *
     * @return  mixed
     */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->only('name',), $id);
    }
    
    /**
     * @param  mixed  $id
     *
     * @return  mixed
     */
    public function delete(mixed $id)
    {
        return $this->repository->delete($id);
    }
    
}