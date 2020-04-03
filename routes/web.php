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

Route::get('/', function () {
    return view('home');
});

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('docentes/area', 'AreadocentesController@docente');//redirec login

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::get('acudientes/login', 'AcudientesController@showLoginForm');
Route::post('acudientes/login','AcudientesController@login');
Route::get('logout',           'AcudientesController@logout');
Route::resource('acudientes/area', 'AreaacudientesController');

Route::get('acudiente/password/reset', 'acudientes\AcudienteForgotPasswordController@showLinkRequestForm')->name('acudiente.password.request');
Route::post('acudiente/password/email', 'acudientes\AcudienteForgotPasswordController@sendResetLinkEmail')->name('acudiente.password.email');
Route::get('acudiente/password/reset/{token}', 'acudientes\AcudienteResetPasswordController@showResetForm')->name('acudiente.password.reset');
Route::post('acudiente/password/reset', 'acudientes\AcudienteResetPasswordController@reset')->name('acudiente.password.update');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('mensajes', 'MessagesController');

Route::resource('docente','DocenteController');
Route::resource('lista/acudientes','ListaacudientesController');
Route::resource('lista/alumnos','ListaalumnosController');
Route::resource('crear/alumnosmatricula','CrearalumnosController');
Route::resource('matricula','MatriculaController');
