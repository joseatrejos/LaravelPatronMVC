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
            // Controller@function, -> (directory.function)
Route::get('/', 'NoticiaController@index') -> name('noticias.index');
Route::get('/noticias/{id}', 'NoticiaController@show') -> name('noticias.show');

Route::get('/admin', 'AdminController@dashboard') -> name('admin.dashboard');

Auth::routes(['register' => false]);
