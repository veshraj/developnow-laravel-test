<?php
    namespace Modules\Client\Repositories\Criterias;

    use App\Repositories\interfaces\CriteriaInterface;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;

    class CartCriteria implements CriteriaInterface
    {
        public function sortables(): array {
            return [];
        }

        public function apply(Request $request, Builder $queryModel)
        : Builder {
    
            if($request->input('orderBy') && array_search($request->input('orderBy'),$this->sortables()))
            {
                $queryModel->orderBy($request->input('orderBy'), $request->input('order') == 'DESC'?: 'ASC');
            }

            return $queryModel;
        }
    }