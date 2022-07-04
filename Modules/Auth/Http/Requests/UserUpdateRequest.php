<?php
namespace Modules\Auth\Http\Requests;

use App\Http\Requests\ApiRequest;

class UserUpdateRequest extends ApiRequest
{
public function rules() : array
{
return [
            'name' => ['max:255','required',],
            'email' => ['max:255','required',],
            'designation' => ['max:255','required',],
        ];
}
}

