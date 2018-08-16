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

Route::group(['prefix' => 'laravel-easy-crud'], function () {
    Route::get('/', 'Crud1Controller@index');
    Route::match(['get', 'post'], 'create', 'Crud1Controller@create');
    Route::match(['get', 'put'], 'update/{id}', 'Crud1Controller@update');
    Route::delete('delete/{id}', 'Crud1Controller@delete');
});

Route::group(['prefix' => 'laravel-crud-search-sort-ajax'], function () {
    Route::get('/', 'Crud3Controller@index');
    Route::match(['get', 'post'], 'create', 'Crud3Controller@create');
    Route::match(['get', 'put'], 'update/{id}', 'Crud3Controller@update');
    Route::delete('delete/{id}', 'Crud3Controller@delete');
});