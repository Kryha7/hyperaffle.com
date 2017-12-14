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

Route::get('admin/raffles', [
    'uses' => 'RafflesController@index',
    'as' => 'admin.raffles'
])->middleware('auth');

Route::get('admin/raffle/create', [
    'uses' => 'RafflesController@create',
    'as' => 'admin.raffle.create'
])->middleware('auth');

Route::get('admin/raffle/edit/{raffle}', [
    'uses' => 'RafflesController@edit',
    'as' => 'admin.raffle.edit'
])->middleware('auth');

Route::post('admin/raffle/store', [
    'uses' => 'RafflesController@store',
    'as' => 'admin.raffle.store'
])->middleware('auth');

Route::post('admin/raffle/update/{raffle}', [
    'uses' => 'RafflesController@update',
    'as' => 'admin.raffle.update'
])->middleware('auth');

Route::get('admin/raffle/delete/{raffle}', [
    'uses' => 'RafflesController@delete',
    'as' => 'admin.raffle.delete'
])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
