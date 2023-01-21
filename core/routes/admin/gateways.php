<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payment/gateway', 'as' => 'gateway.'], function () {
    Route::group(['prefix' => 'automatic', 'as' => 'automatic.'], function () {
        Route::get('index', ['middleware' => 'acl:view_payment_gateway', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\GatewayController@index']);
        Route::get('edit/{alias}', ['middleware' => 'acl:payment_gateway_edit', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\GatewayController@edit']);
        Route::post('update/{alias}', ['middleware' => 'acl:payment_gateway_update', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\GatewayController@update']);
        Route::post('remove/{alias}', ['middleware' => 'acl:payment_gateway_remove', 'as' => 'remove', 'uses' => '\App\Http\Controllers\Admin\GatewayController@remove']);
        Route::post('status/change', ['middleware' => 'acl:payment_gateway_status_change', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\GatewayController@statusChange']);
    });
});
