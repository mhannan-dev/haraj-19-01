<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
    Route::get('pending', 'WithdrawalController@pending')->name('pending');
    Route::get('approved', 'WithdrawalController@approved')->name('approved');
    Route::get('rejected', 'WithdrawalController@rejected')->name('rejected');
    Route::get('log', 'WithdrawalController@log')->name('log');
    Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
    Route::get('{scope}/search', 'WithdrawalController@search')->name('search');
    Route::get('date-search/{scope}', 'WithdrawalController@dateSearch')->name('dateSearch');
    Route::get('details/{id}', 'WithdrawalController@details')->name('details');
    Route::post('approve', 'WithdrawalController@approve')->name('approve');
    Route::post('reject', 'WithdrawalController@reject')->name('reject');
    // Withdraw Method
    Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
    Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
    Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
    Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
    Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
    Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
    Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
});
