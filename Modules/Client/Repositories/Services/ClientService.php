<?php

namespace Modules\Client\Repositories\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Client\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Http\Request;

class ClientService
{
    /**
     * @var  ClientRepositoryInterface
     */
    protected $repository;
    
    /**
     * ClientRepository constructor.
     *
     * @param  ClientRepositoryInterface  $repository
     */
    public function __construct(ClientRepositoryInterface $repository)
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
        return $this->repository->create($request->only('name', 'email', 'mobile', 'password'));
    }
    
    /**
     * @param  array  $inputData
     *
     * @return  mixed
     */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->only('name', 'email', 'mobile'), $id);
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