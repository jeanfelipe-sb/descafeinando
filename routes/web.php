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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->prefix('painel')->group(function() {
    Route::get('/', 'Usuarios\PainelsController@index');
    //Routes - Todos os usuários de Level:0 (leitor)
    Route::middleware(['level:0'])->group(function() {
        Route::get('/configuracoes', 'Usuarios\UserController@config')->name('config');
        Route::put('/configuracoes', 'Usuarios\UserController@config_update')->name('config.update');
    });
    //Routes - Todos os usuários de Level:1 (revisor)
    Route::middleware(['level:1'])->group(function() {

        Route::resource('tags', 'Usuarios\TagsController');
        Route::resource('categorias', 'Usuarios\CategoriasController');
    });
    //Routes - Todos os usuários de Level:2 (admin)
    Route::middleware(['level:2'])->group(function() {
        Route::resource('users', 'Usuarios\UserController');
        Route::put('/tags/update', 'Usuarios\TagsController@update')->name('tags.update');
        Route::get('/users/index/{filtro?}', 'Usuarios\UserController@index');
    });
});


