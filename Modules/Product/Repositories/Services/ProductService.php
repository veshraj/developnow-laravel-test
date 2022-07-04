<?php

namespace Modules\Product\Repositories\Services;

use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService
{
    /**
     * @var  ProductRepositoryInterface
     */
    protected $repository;
    
    /**
     * ProductRepository constructor.
     *
     * @param  ProductRepositoryInterface  $repository
     */
    public function __construct(ProductRepositoryInterface $repository)
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
        return $this->repository->with(['productCategory'])->getPaginate($request);
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
        return $this->repository->with(['productCategory'])->create($request->only('name', 'price', 'category_id',
            'image', 'inventory_stock'));
    }
    
    /**
     * @param  array  $inputData
     *
     * @return  mixed
     */
    public function update(Request $request, $id)
    {
        return $this->repository->with(['productCategory'])
                                ->update($request->only('name', 'price', 'category_id',
                                    'image', 'inventory_stock'),
                                    $id);
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