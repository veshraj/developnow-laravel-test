<?php

namespace Modules\Auth\Repositories;

use App\Repositories\BaseRepository;
use Modules\Auth\Repositories\Contracts\UserRepositoryInterface;
use Modules\Auth\Models\User;
use Modules\Auth\Repositories\Criterias\UserCriteria;

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
    
}
