<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheHelper
{
    protected $primaryKey = 'id';

    /**
     * @param string $key
     * @return mixed
     */
    function getCache(string $key)
    {
        return Cache::get($key);
    }

    /**
     * @param string $key
     * @param $models
     * @return mixed
     */
    function setCache(string $key, $items)
    {
        return Cache::put($key, $items);
    }

    /**
     * @param $key
     * @param $item
     * @return bool
     */
    function addItem($key, $item)
    {
        $collections = Cache::get($key);
        $collections->push($item);
        Cache::forget($key);
        $this->setCache($key, $collections);
        return true;
    }

    /**
     * @param $key
     * @param $attribute
     * @param $value
     * @return mixed
     */
    function getItemsByAttribute(string $key, string $attribute, $value)
    {
        return Cache::get($key)->where($attribute, $value);
    }

    /**
     * @param $key
     * @param $value
     * @param null $primaryKey
     * @return mixed
     */
    function getItem($key, $value, $primaryKey = null)
    {
        return Cache::get($key)->where($primaryKey ?? $this->primaryKey, $value);
    }

    /**
     * @param $key
     * @param $value
     * @param null $primaryKey
     * @return bool
     */
    function deleteItem($key, $value, $primaryKey = null)
    {
        $collections = Cache::get($key);
        $collections = $collections->where(($primaryKey) ?? $this->primaryKey, '!=', $value);
        Cache::put($key, $collections);
        return true;
    }
}
