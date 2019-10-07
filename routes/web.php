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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Control@index');

//Rutas de Grupo

Route::get('/grupos/create','PaginaController@create')->name('grupos.create');

Route::post('/grupos/create','PaginaController@store');

Route::get('/grupos/{$slug}', 'PaginaController@show')->name('grupos.show');

Route::resource('grupos','PaginaController');

//route Comunidad

Route::resource('comunidades', 'ComunidadController');

Route::get('/comunidades/create','ComunidadController@create')->name('comunidades.create');

Route::post('/comunidades/create','ComunidadController@store');

Route::get('/comunidades/{$slug}', 'ComunidadController@show')->name('comunidades.show');

//route Persona

Route::resource('personas','PersonaController');

Route::get('/grupos/{grupo}/personas','PersonaController@index');

Route::post('/grupos/{grupo}/personas','PersonaController@store');

Route::put('/grupos/{grupo}/personas/{id}', 'PersonaController@update');

Route::delete('/grupos/{grupo}/personas/{id}', 'PersonaController@destroy');

//route info
Route::resource('info', 'MensajeController');

Route::get('/comunidades/{comunidad}/info','MensajeController@index');

Route::post('/comunidades/{comunidad}/info','MensajeController@store');

Route::put('/comunidades/{comunidad}/info/{id}','MensajeController@update');

Route::delete('/comunidades/{comunidad}/info/{id}','MensajeController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@profile')->name('user.profile');

Route::patch('/profile', 'UserController@update_profile')->name('user.profile.update');