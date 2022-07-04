<?php

namespace Modules\Auth\Http\Requests;

use App\Constants\DBTables;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends ApiRequest
{
    public function rules()
    : array
    {
        return [
            'name'        => ['max:255', 'required',],
            'email'       => ['max:255', 'required', 'email:rfc,dns', 'unique:'.DBTables::USERS],
            'designation' => ['max:255', 'required',],
            'password'    => [
                'required',
                'string',
                Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                'confirmed',
            ],
        ];
    }
}

