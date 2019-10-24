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
MAIL_ENCRYPTION=tls
*/
/*Route::get('/notification', function() {
    $user = User::find(1);
    $comment = Comment::withTrashed()->find(1);
    $user->notify(new CommentCreated($comment));
});

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Control@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Perfil/Profile
Route::get('/profile', 'ProfileController@profile')->name('user.profile');
Route::patch('/profile', 'ProfileController@update_profile')->name('user.profile.update');

Route::middleware(['auth'])->group(function () {

	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');
	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');
	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');
	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');
	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
		
	//Grupos
	Route::post('grupos/create', 'PaginaController@store')->name('grupos.store')
		->middleware('permission:grupos.create');
	Route::get('grupos', 'PaginaController@index')->name('grupos.index')
		->middleware('permission:grupos.index');
	Route::get('grupos/create', 'PaginaController@create')->name('grupos.create')
		->middleware('permission:grupos.create');
	Route::put('grupos/{grupo}', 'PaginaController@update')->name('grupos.update')
		->middleware('permission:grupos.edit');
	Route::get('grupos/{grupo}', 'PaginaController@show')->name('grupos.show')
		->middleware('permission:grupos.show');
	Route::delete('grupos/{grupo}', 'PaginaController@destroy')->name('grupos.destroy')
		->middleware('permission:grupos.destroy');
	Route::get('grupos/{grupo}/edit', 'PaginaController@edit')->name('grupos.edit')
		->middleware('permission:grupos.edit');

	//Comunidades
	Route::post('comunidades/create', 'ComunidadController@store')->name('comunidades.store')
		->middleware('permission:comunidades.create');
	Route::get('comunidades', 'ComunidadController@index')->name('comunidades.index')
		->middleware('permission:comunidades.index');
	Route::get('comunidades/create', 'ComunidadController@create')->name('comunidades.create')
		->middleware('permission:comunidades.create');
	Route::put('comunidades/{comunidades}', 'ComunidadController@update')->name('comunidades.update')
		->middleware('permission:comunidades.edit');
	Route::get('comunidades/{comunidades}', 'ComunidadController@show')->name('comunidades.show')
		->middleware('permission:comunidades.show');
	Route::delete('comunidades/{comunidades}', 'ComunidadController@destroy')->name('comunidades.destroy')
		->middleware('permission:comunidades.destroy');
	Route::get('comunidades/{comunidades}/edit', 'ComunidadController@edit')->name('comunidades.edit')
		->middleware('permission:comunidades.edit');

	//Personas
	Route::resource('personas','PersonaController');
	Route::get('/grupos/{grupo}/personas','PersonaController@index');
	Route::post('/grupos/{grupo}/personas','PersonaController@store');
	Route::put('/grupos/{grupo}/personas/{id}', 'PersonaController@update');
	Route::delete('/grupos/{grupo}/personas/{id}', 'PersonaController@destroy');

	//Info
	Route::resource('info', 'MensajeController');
	Route::get('/comunidades/{comunidad}/info','MensajeController@index');
	Route::post('/comunidades/{comunidad}/info','MensajeController@store');
	Route::put('/comunidades/{comunidad}/info/{id}','MensajeController@update');
	Route::delete('/comunidades/{comunidad}/info/{id}','MensajeController@destroy');

	//Mensajes
	Route::resource('mensajeria', 'SendController');
	Route::get('/mensajeria', 'SendController@index')->name('mensajeria.index');
	Route::get('/mensajeria/create', 'SendController@create')->name('mensajeria.create');
	Route::post('/mensajeria/create', 'SendController@store')->name('mensajeria.store');
	Route::get('/mensajeria/{id}', 'SendController@show')->name('mensajeria.show');
	Route::delete('/mensajeria/{id}', 'SendController@destroy')->name('mensajeria.destroy');
});
