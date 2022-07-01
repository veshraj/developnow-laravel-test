<?php


namespace App\Traits;

use Illuminate\Support\Str;

trait CollectionHelper
{
    protected $eachSidePages = 4;
    protected $pageNumber    = 1;
    protected $collection;

    protected function getItemsByPageNumber($collection, $pageNumber)
    {
        $this->pageNumber = ($this->pageNumber) ?? $pageNumber;

        return $collection->forPage($pageNumber, $this->getPagesize());
    }

    protected function getPagesize()
    {
        if (request()->get('page_size')) {
            return request()->get('page_size');
        }

        return 20;
    }

    protected function filter()
    {
        return true;
    }


    protected function getPages($collection)
    {
        $pages           = $this->eachSidePages * 2;
        $totalPages      = $collection->count() / $this->getPagesize();
        $minPage         = ($this->pageNumber - $this->eachSidePages > 1) ? ($this->pageNumber - $this->eachSidePages) : 1;
        $maxPage         = $this->pageNumber + $this->eachSidePages + abs(($minPage == 1) ? ($minPage - $this->eachSidePages - 1) : 0);
        $maxPageExceedBy = $totalPages - $maxPage;
        $maxPage         = ($totalPages < $maxPage) ? $totalPages : $maxPage;
        $minPage         += ($maxPageExceedBy < 0 && $minPage > 1) ? $maxPageExceedBy : 0;

        return range($minPage, $maxPage);
    }

    protected function filterCollection(&$collection, $attribute, $pattern)
    {
        $pattern    = strtolower($pattern);
        $collection = $collection->filter(function ($item) use ($attribute, $pattern) {
            return Str::is("*{$pattern}*", strtolower($item->{$attribute}));
        });
    }
}
