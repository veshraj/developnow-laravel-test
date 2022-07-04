<?php

namespace Modules\Product\Http\Requests;

use App\Constants\DBTables;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends ApiRequest
{
    public function authorize()
    : bool
    {
        return parent::authorize();
    }
    
    public function prepareForValidation()
    {
        // write code that needs to be before validation
    }
    
    public function rules()
    : array
    {
        return [
            'name'            => [
                'max:255', 'required',
                sprintf('unique:%s,name,%s,id,deleted_at,NULL', DBTables::PRODUCT_CATEGORIES, $this->segment(4)),
            ],
            'price'           => ['required',],
            'category_id'     => [
                'required', sprintf('exists:%s,id,deleted_at,NULL', DBTables::PRODUCT_CATEGORIES),
            ],
            'inventory_stock' => ['',],
        ];
    }
}

