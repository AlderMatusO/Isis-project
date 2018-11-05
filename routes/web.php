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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/consumos', 'Consumos\NotasController@index')->name('consumos');
Route::get('/consumos/data', 'Consumos\NotasController@getConsumos')->name('datos');
Route::get('/consumos/categorias', 'Consumos\NotasController@getCategorias')->name('categorias');
Route::get('/consumos/productos/{parametro}', 'Consumos\NotasController@getProductos')->name('productos');
Route::get('/consumos/precios/{id_producto}', 'Consumos\NotasController@getPrecios')->name('precios');
Route::get('/consumos/mesas/', 'Consumos\NotasController@getMesas')->name('mesas');
Route::get('/consumos/meseros/', 'Consumos\NotasController@getMeseros')->name('meseros');
Route::post('/consumos/save/', 'Consumos\NotasController@saveConsumo')->name('save');
