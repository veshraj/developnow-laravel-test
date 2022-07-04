<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\API\V1\ProductCategoryController;
use Modules\Product\Http\Controllers\API\V1\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/product-categories', ProductCategoryController::class);
Route::resource('/v1/products', ProductController::class);