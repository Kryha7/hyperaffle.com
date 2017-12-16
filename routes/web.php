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
Auth::routes();
//Index

Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index'
]);

Route::post('/add_tickets/{raffle}', [
    'uses' => 'IndexController@add_tickets',
    'as' => 'add_tickets'
])->middleware('auth');

//Site

Route::get('profile', [
    'uses' => 'ProfileController@index',
    'as' => 'profile'
])->middleware('auth');

Route::get('tickets', [
    'uses' => 'ProfileController@tickets',
    'as' => 'tickets'
])->middleware('auth');


//Users

Route::get('admin/users', [
    'uses' => 'UsersController@index',
    'as' => 'admin.users'
])->middleware('auth');

Route::get('admin/user/edit/{user}', [
    'uses' => 'UsersController@edit',
    'as' => 'admin.user.edit'
])->middleware('auth');

Route::post('admin/user/update/{user}', [
    'uses' => 'UsersController@update',
    'as' => 'admin.user.update'
])->middleware('auth');

Route::get('admin/user/delete/{user}', [
    'uses' => 'UsersController@delete',
    'as' => 'admin.user.delete'
])->middleware('auth');

//Raffles

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