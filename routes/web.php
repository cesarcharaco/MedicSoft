<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('/')->group( function () {
	Auth::routes();
	Route::get('/', function () { return view('auth.login'); });
});

Route::prefix('admin')->middleware('auth')->group( function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/pacientes','PacientesController');
	Route::resource('/pacientes_nt','PacientesNtController');
	Route::resource('/especialidades','EspecialidadesController');
	Route::resource('/tipoconsultas','TipoConsultaController');
	Route::resource('/medicos','MedicosController');
	Route::resource('/consultasmontos','ConsultasMontosController');
	Route::resource('/horarios','HorariosController');
	Route::get('/horarios/{id}/show2',[
		'uses' => 'HorariosController@show2',
		'as' => 'admin.horarios.show2' ]);
	Route::resource('/consultas','ConsultasController');
	Route::post('/consultas/vistas',[
		'uses' => 'ConsultasController@vistas',
		'as' => 'admin.consultas.vistas'
		]);
	Route::get('/mostrarpacientes',[
		'uses' => 'ConsultasController@mostrarpacientes',
		'as' => 'admin.mostrarpacientes'
		]);
	Route::get('/consultas/{id}/verconsultas',[
		'uses' => 'ConsultasController@verconsultas',
		'as' => 'admin.consultas.verconsultas'
		]);
	Route::get('/reportediario',[
		'uses' => 'ConsultasController@reportediario',
		'as' => 'admin.reportediario'
		]);
	Route::get('/reportediariovistas',[
		'uses' => 'ConsultasController@reportediariovistas',
		'as' => 'admin.reportediariovistas'
		]);
	Route::get('/consultas/editardiagnostico',[
		'uses' => 'ConsultasController@editardiagnostico',
		'as' => 'admin.consultas.editardiagnostico'
		]);
});

