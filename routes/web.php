<?php
Route::get('/', function(){
    return view('index');
});
Route::get('account', function(){
    return view('index');
});

Route::get('account/manage', 'TransactionController@index');
Route::get('account/manage/transactions', 'TransactionController@show');
Route::get('account/manage/balance', 'TransactionController@showBalance');
Route::get('account/manage/deposit', 'TransactionController@create');
Route::get('account/manage/withdraw', 'TransactionController@edit');


Route::Post('account/manage/deposit', 'TransactionController@store');
Route::Post('account/manage/withdraw', 'TransactionController@update');



