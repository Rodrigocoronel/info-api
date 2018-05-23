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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/ranchs', function (Request $request) {
//     echo "a";
// });


Route::middleware(['auth:api'])->group(function () {

    Route::get('/user', function (Request $request) {

        $user = $request->user();
        $user['routes'] = $user->routesArray; 

    	return $user;
    });

});




