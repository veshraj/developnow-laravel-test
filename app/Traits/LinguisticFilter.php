<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Modules\Config\Models\Language;

trait LinguisticFilter
{
    public function filterByLanguage(Request $request, Builder $builder)
    {
        if ($request->hasHeader('accept-language')) {
            $builder->whereHas('language', function ($query) use ($request) {
                return $query->where('code', $request->header('accept-language'));
            });
        }
    }
}