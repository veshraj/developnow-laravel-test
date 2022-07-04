<?php

namespace Modules\Product\Http\Requests;

use App\Constants\DBTables;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends ApiRequest
{
    public function rules()
    : array
    {
        return [
            'name' => [
                'max:255', 'required',
                sprintf('unique:%s,name,%s,id,deleted_at,NULL', DBTables::PRODUCT_CATEGORIES, $this->segment(4)),
            ],
        ];
    }
}

