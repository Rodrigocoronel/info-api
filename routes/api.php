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
    Route::post('/logout', function(Request $request) {
		$request->user()->token()->revoke();
		return response()->json([]);
	});







});

	Route::get('/configuracion', 'ConfiguracionController@show');
	Route::post('/configuracion/{id}', 'ConfiguracionController@update');


	Route::get('/secciones', 'SeccionesController@index');
	Route::get('/secciones/{id}', 'SeccionesController@show');	
	Route::post('/secciones', 'SeccionesController@register');
	Route::post('/secciones/{id}', 'SeccionesController@update');
	Route::delete('/secciones/{id}', 'SeccionesController@destroy');

	Route::post('/secciones_has/', 'SeccionesController@has');
	

	/*Nimblin*/
	Route::get('/seccion/{seccion}', 'SeccionesController@seccion');
	Route::get('/promedio_diputados','PorcentajeController@promedioDiputados');
	Route::get('/promedio_senadores','PorcentajeController@promedioSenadores');
	Route::get('/seccionesPorDistrito/{distrito}', 'PorcentajeController@Todos');

	/* we natives */
	Route::get('/porcentajes/seccion/{id}','PorcentajeController@seccion');
	Route::get('/porcentajesSen/seccion/{id}','PorcentajeController@seccionSen');

	/*print*/
	Route::get('/print/seccion/{distrito}', 'PorcentajeController@print');
	Route::get('/print/seccionUni/{id}','PorcentajeController@printSeccion');




