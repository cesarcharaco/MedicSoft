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
		'as' => 'admin.mostrarpacientes']);
	Route::resource('/laboratorios','LaboratoriosController');

	Route::get('/consultas/{id}/verconsultas',[
		'uses' => 'ConsultasController@verconsultas',
		'as' => 'admin.consultas.verconsultas'
		]);
	Route::get('/consultas/{id}/buscarmedicos',[
		'uses' => 'ConsultasController@mostrarmedicos',
		'as' => 'admin.consultas.buscarmedicos'
		]);
	Route::get('/reportediario',[
		'uses' => 'ConsultasController@reportediario',
		'as' => 'admin.reportediario'
		]);
	Route::get('/reportediariovistas',[
		'uses' => 'ConsultasController@reportediariovistas',
		'as' => 'admin.reportediariovistas'
		]);
	Route::post('/consultas/editardiagnostico',[
		'uses' => 'ConsultasController@editardiagnostico',
		'as' => 'admin.consultas.editardiagnostico'
		]);
	//para inventario
	Route::resource('/oficinas','OficinasController');
	Route::resource('/materiales','MaterialesController');
	Route::resource('/pedidos_oficinas','PedidosOficinasController');
	Route::get('/pedidos_oficinas/{id}/vermateriales',[
		'uses' => 'PedidosOficinasController@vermateriales',
		'as' => 'admin.pedidos_oficinas.vermateriales'
		]);
	Route::get('/seleccionarfecha',[
		'uses' => 'PedidosOficinasController@seleccionarfecha',
		'as' => 'admin.pedidos_oficinas.seleccionarfecha'
		]);
	Route::post('/buscarpedidos',[
		'uses' => 'PedidosOficinasController@buscarpedidos',
		'as' => 'admin.pedidos_oficinas.buscarpedidos'
		]);

	Route::resource('/solicitud_materiales','MaterialesSolicitadosController');
	Route::get('/solicitud_materiales/{id}/vermateriales',[
		'uses' => 'MaterialesSolicitadosController@vermateriales',
		'as' => 'admin.solicitud_materiales.vermateriales'
		]);
	Route::get('/buscarsolicitudes/{fecha}',[
		'uses' => 'MaterialesSolicitadosController@buscarsolicitudes',
		'as' => 'admin.solicitud_materiales.buscarsolicitud']);
	Route::resource('/recepcion_materiales','RecepcionMaterialesController');
	Route::get('/recepcion_materiales/{fecha}/recibir',[
		'uses' => 'RecepcionMaterialesController@recibir',
		'as' => 'admin.recepcion_materiales.recibir'
		]);
	
	Route::get('/recepcion_materiales/{id}/vermateriales',[
		'uses' => 'RecepcionMaterialesController@vermateriales',
		'as' => 'admin.recepcion_materiales.vermateriales'
		]);
});

