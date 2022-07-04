<?php

namespace Modules\Client\Repositories\Services;

use Modules\Client\Repositories\Contracts\CartRepositoryInterface;
use Illuminate\Http\Request;

class CartService
{
    /**
     * @var  CartRepositoryInterface
     */
    protected $repository;
    
    /**
     * CartRepository constructor.
     *
     * @param  CartRepositoryInterface  $repository
     */
    public function __construct(CartRepositoryInterface $repository)
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
        return $this->repository->create($request->only('product_id', 'client_id', 'quantity', 'price'));
    }
    
    /**
     * @param  array  $inputData
     *
     * @return  mixed
     */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->only('product_id', 'client_id', 'quantity', 'price'), $id);
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