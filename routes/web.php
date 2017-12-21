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

Route::get('admin/raffle/winner/{raffle}', [
    'uses' => 'RafflesController@raffle_winner',
    'as' => 'admin.raffle.winner'
])->middleware('auth');

Route::get('admin/raffle/winners', [
    'uses' => 'RafflesController@winners',
    'as' => 'admin.raffle.winners'
])->middleware('auth');

Route::get('admin/raffle/show-winner/{raffle}', [
    'uses' => 'RafflesController@show_winner',
    'as' => 'admin.raffle.show_winner'
])->middleware('auth');

//Tickets transactions

Route::get('admin/tickets-transactions', [
    'uses' => 'TicketsTransactions@index',
    'as' => 'admin.tickets_transactions'
])->middleware('auth');

//Payment transactions

Route::get('admin/payment-transactions', [
    'uses' => 'PaymentTransactions@index',
    'as' => 'admin.payment_transactions'
])->middleware('auth');

//Paypal payment

//---------------------------
// route for view/blade file
//---------------------------
//Route::get('addPayment','PayPalController@addPayment')->name('addPayment')->middleware('auth');

//-------------------------
// route for post request
//-------------------------
//Route::post('paypal', 'PayPalController@postPaymentWithpaypal')->name('paypal')->middleware('auth');

//---------------------------------
// route for check status responce
//---------------------------------
//Route::get('paypal','PayPalController@getPaymentStatus')->name('status')->middleware('auth');

//Paypal payment

//---------------------------
// route for view/blade file
//---------------------------
Route::get('tickets','PaymentController@tickets')->name('tickets')->middleware('auth');

//-------------------------
// route for post request
//-------------------------
Route::post('paypal', 'PaymentController@postPayment')->name('paypal')->middleware('auth');

//---------------------------------
// route for check status responce
//---------------------------------
Route::get('paypal','PaymentController@getPaymentStatus')->name('status')->middleware('auth');

