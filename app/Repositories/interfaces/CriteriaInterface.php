<?php
    
    namespace App\Repositories\interfaces;
    
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;

    interface CriteriaInterface
    {
        public function apply(Request $request, Builder $model): Builder;
    }