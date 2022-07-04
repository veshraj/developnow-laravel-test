<?php

namespace Modules\Product\Repositories\Criterias;

use App\Repositories\interfaces\CriteriaInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductCategoryCriteria implements CriteriaInterface
{
    public function apply(Request $request, Builder $queryModel)
    : Builder {
        if ($request->input('name')) {
            $queryModel->where('name', 'like', "%".$request->input("name")."%");
        }
        
        if ($request->input('orderBy') && array_search($request->input('orderBy'), $this->sortables())) {
            $queryModel->orderBy($request->input('orderBy'), $request->input('order') == 'DESC' ?: 'ASC');
        }
        
        
        return $queryModel;
    }
    
    public function sortables()
    : array
    {
        return ['id', 'created_at', 'name'];
    }
}