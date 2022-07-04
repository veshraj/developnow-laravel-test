<?php

namespace Modules\Auth\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Repositories\Contracts\UserRepositoryInterface;
use Modules\Auth\Models\User;
use Modules\Auth\Repositories\Criterias\UserCriteria;
use Modules\Product\Repositories\Resources\UserResource;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    
    protected User $model;
    
    public function model()
    : User
    {
        return new User();
    }
    
    /**
     * @param $email
     * @return mixed
     */
    public function getByVerifiedEmail($email)
    : mixed {
        return $this->model->where('email', $email)
                           ->whereNotNull('email_verified_at')
                           ->first();
    }
    
    public function resource(Model $instance)
    : JsonResource {
        return new UserResource($instance);
    }
}
