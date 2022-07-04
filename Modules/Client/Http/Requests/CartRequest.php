<?php

namespace Modules\Client\Http\Requests;

use App\Constants\DBTables;
use App\Http\Requests\ApiRequest;

class CartRequest extends ApiRequest
{
    public function authorize()
    : bool
    {
        return parent::authorize();
    }
    
    public function prepareForValidation()
    {
//        $this->merge(['client_id' => auth()->id(),]);
    }
    
    public function rules()
    : array
    {
        return [
            'product_id' => ['required', sprintf('exists:%s,id,deleted_at,NULL', DBTables::PRODUCTS)],
            'quantity'   => ['required', 'numeric',],
            'price'      => ['required', 'numeric',],
            'client_id'  => ['required', 'numeric', sprintf('exists:%s,id,deleted_at,NULL', DBTables::CLIENTS)],
        ];
    }
}

