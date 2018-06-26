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

Route::middleware('auth')->group(function () {
    Route::get('/', 'AccountsController@index');

    Route::resource('accounts', 'AccountsController');
    Route::resource('transactions', 'TransactionsController');

    Route::get('accounts-list', 'AccountsController@accountsList');
    Route::get('transactions-list/{id?}', 'TransactionsController@transactionsList');

    Route::get('accounts/{id}/transactions', 'TransactionsController@showAccountTransactions');
});