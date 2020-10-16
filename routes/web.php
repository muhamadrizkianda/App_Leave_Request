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

Route::group(['middleware' => 'auth'], function() {
  Route::get('/index', 'IndexController@index')->name('index');

  Route::group(['prefix' => 'Request'], function() {
    Route::get('/', 'RequestController@index');
    Route::post('/', 'RequestController@store');
    Route::get('/new', 'RequestController@create');
    Route::get('/{id}', 'RequestController@edit');
    Route::put('/{id}', 'RequestController@update');
    Route::delete('/{id}', 'RequestController@destroy');
  });
    Route::group(['prefix' => 'Cuti'], function() {
    Route::get('/', 'DetailCutiController@index');
    Route::post('/', 'DetailCutiController@store');
    Route::get('/new', 'DetailCutiController@create');
    Route::get('/{id}', 'DetailCutiController@edit');
    Route::put('/{id}', 'DetailCutiController@update');
    Route::delete('/{id}', 'DetailCutiController@destroy');
  });

  });
