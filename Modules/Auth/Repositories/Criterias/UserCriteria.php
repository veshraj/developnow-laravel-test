<?php
    namespace Modules\Auth\Repositories\Criterias;

    use App\Repositories\interfaces\CriteriaInterface;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;

    class UserCriteria implements CriteriaInterface
    {

        public function apply(Request $request, Builder $queryModel)
        : Builder {
        
            if ($request->input('name')) {
                $queryModel->where('name', 'like', "%".$request->input("name")."%");
            }
            
            if ($request->input('email')) {
                $queryModel->where('email', 'like', "%".$request->input("email")."%");
            }
                
            return $queryModel;
        }
    }