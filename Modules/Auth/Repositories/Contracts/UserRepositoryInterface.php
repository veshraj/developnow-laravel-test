<?php

namespace Modules\Auth\Repositories\Contracts;

use App\Repositories\BaseInterface;

interface  UserRepositoryInterface extends BaseInterface
{
    public function getByVerifiedEmail($email);
}
