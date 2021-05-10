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

Route::get('/', function () {
    return view('home');
});

Route::get('/produto', 'productsController@index')->name('products.index');

Route::get('/produto/{id}', 'productsController@show')->name('products.show');

Route::get('/produto/alterar/{id}', 'productsController@edit')->name('products.edit');

Route::put('/produto/alteracao/{id}', 'productsController@update')->name('products.update');

Route::delete('/produto/excluir/{id}', 'productsController@destroy')->name('products.destroy');

Route::get('/produto/pesquisa/', 'productsController@search')->name('products.search');

Route::post('/produto/store', 'productsController@store')->name('products.store');
