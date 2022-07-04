<?php

namespace Modules\Client\Http\Requests;

use App\Constants\DBTables;
use App\Http\Requests\ApiRequest;
use Carbon\Carbon;

class ClientRequest extends ApiRequest
{
    public function authorize()
    : bool
    {
        return parent::authorize();
    }
    
    public function prepareForValidation()
    {
        $this->merge(['verified_at' => Carbon::now()]);
    }
    
    public function rules()
    : array
    {
        return [
            'name'     => ['required', 'max:255'],
            'email'    => [
                'max:255', 'required', 'email',
                sprintf('unique:%s,email,%s,id,deleted_at,NULL', DBTables::CLIENTS, $this->segment(4)),
            ],
            'mobile'   => [
                'max:255', 'required',
                sprintf('unique:%s,mobile,%s,id,deleted_at,NULL', DBTables::CLIENTS, $this->segment(4)),
            ],
            'password' => ['max:255', 'required', 'confirmed'],
        ];
    }
}

