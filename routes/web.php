<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PagesController@index')->name('inicio');

Route::get('/detalle{id}','PagesController@detalle')->name('notas.detalle');

Route::post('/','PagesController@agregar')->name('notas.agregar');

Route::get('/editar/{id}','PagesController@editar')->name('notas.editar');

Route::put('/editar/{id}','PagesController@update')->name('notas.update');

Route::get('fotos','PagesController@fotos')->name('fotos');

Route::get('blog','PagesController@blog')->name('blog'); // se pone un nombre a la ruta para poder llamarla en cualquier parte del codigo, y si cambiamos la direccion de la ruta no se vera afectado en el nombre

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');