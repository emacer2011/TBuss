<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//URL para visualizacion de logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Modelo laravel que majera todo el proceso de login y registro de ususarios
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [
	'uses' => 'HomeController@index',
	'middleware' => 'roles',
	'url' => 'home',
	'action' => 'get',
]);

Route::get('/eliminar/registro', [
	'as' => 'eliminar.registro.index', 
	'uses' => 'EliminarRegistroController@index',
	'middleware' => 'roles',
	'url' => 'eliminar/registro',
	'action' => 'get',
]);

Route::get('/listar/registros', [
	'as' => 'registros.ver.listado',
	'uses' => 'ListadoController@index',
	'middleware' => 'roles',
	'url' => 'listar/registros',
	'action' => 'get',
]);

Route::get('/listar/registros/ajax', [
	'as' => 'registros.ver.listadoAjax',
	'uses' => 'ListadoController@listadoAjax',
	'middleware' => 'roles',
	'url' => 'listar/registros',
	'action' => 'get',
]);

Route::get('/nuevo/registro', [
	'as' => 'nuevo.registro.index', 
	'uses' => 'NuevoRegistroController@index',
	'middleware' => 'roles',
	'url' => 'nuevo/registro',
	'action' => 'get',
]);

Route::post('/nuevo/registro', [
	'as' => 'nuevo.registro.store', 
	'uses' => 'NuevoRegistroController@store',
	'middleware' => 'roles',
	'url' => 'nuevo/registro',
	'action' => 'post',
]);

/* ------------------------------- ABM Administrador -------------------------------- */

Route::get('ABM/usuarios', [
	'uses' => 'ABMUsuariosController@index',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios',
	'action' => 'get',
]);

################################ Manejo de URL #################################

Route::get('ABM/usuarios/alta/url', [
	'uses' => 'ABMUsuariosController@getFormUrl',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/alta/url',
	'action' => 'get',
]);

Route::post('ABM/usuarios/alta/url', [
	'uses' => 'ABMUsuariosController@postFormUrl',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/alta/url',
	'action' => 'post',
]);

Route::get('ABM/usuarios/listado/url', [
	'uses' => 'ABMUsuariosController@getListadoUrl',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/listado/url',
	'action' => 'get',
]);

Route::post('ABM/usuarios/listado/url', [
	'uses' => 'ABMUsuariosController@postListadoUrl',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/listado/url',
	'action' => 'post',
]);

################################# Manejo de Usuarios ##############################

Route::get('ABM/usuarios/listado', [
	'uses' => 'ABMUsuariosController@getListado',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/listado',
	'action' => 'get',
]);

Route::post('ABM/usuarios/listado', [
	'uses' => 'ABMUsuariosController@postListado',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/listado',
	'action' => 'post',
]);

################################# Manejo de Roles ##############################

Route::get('ABM/usuarios/roles', [
	'uses' => 'ABMUsuariosController@getRoles',
	'middleware' => 'roles',
	'url' => 'ABM/usuarios/roles',
	'action' => 'get',
]);

// /*------------------------- API ANGULAR ---------------------------------*/
Route::get('/angular/registro', [
	'as' => 'angular.registro.ajax',
	'uses' => 'EliminarRegistroController@ajax',
	'middleware' => 'roles',
	'url' => 'eliminar/registro',
	'action' => 'get',
]);

Route::post('/angular/registro', [
	'as' => 'angular.registro.ajaxDelete',
	'uses' => 'EliminarRegistroController@ajaxDelete',
	'middleware' => 'roles',
	'url' => 'eliminar/registro',
	'action' => 'post',
]);