<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (){
   return response()->json([
       'api_name' => 'Vue Store',
       'by' => 'cokoyoh'
   ]);
});

Route::group(['middleware' => 'auth:api'], function (){

    Route::post('/items-store', 'ItemsController@store');

    Route::delete('/items/destroy/{id}', 'ItemsController@destroy');
});

Route::get('/items', 'ItemsController@index');

