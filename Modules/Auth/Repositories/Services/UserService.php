<?php
namespace Modules\Auth\Repositories\Services;

use Modules\Auth\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @var  UserRepositoryInterface
     */
    protected $repository;

    /**
     * UserRepository constructor.
     *
     * @param  UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  Request $request
     *
     * @return  mixed
     */
    public function getList(Request $request)
    {
        return $this->repository->getPaginate($request);
    }

    /**
     * @param  mixed $id
     *
     * @return  mixed
     */
    public function getById(mixed $id)
    {
        return $this->repository->getById($id);
    }

    /**
     * @param  Request $request
     *
     * @return  mixed
     */
    public function create(Request $request)
    {
        return $this->repository->create($request->only( 'id'));
    }

    /**
    * @param  array $inputData
    *
    * @return  mixed
    */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->only( 'id'), $id);
    }
    /**
     * @param  mixed $id
     *
     * @return  mixed
     */
    public function delete(mixed $id)
    {
        return $this->repository->delete($id);
    }

}