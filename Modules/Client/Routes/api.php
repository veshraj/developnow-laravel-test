<?php

use Illuminate\Http\Request;
use Modules\Client\Http\Controllers\API\V1\CartController;
use Modules\Client\Http\Controllers\API\V1\ClientController;

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

Route::middleware('auth:api')->get('/client', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/clients', ClientController::class);
Route::resource('/v1/carts', CartController::class);