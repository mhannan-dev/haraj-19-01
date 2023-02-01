<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.'], function () {
    Route::get('index', ['middleware' => 'acl:view_advertiser', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@allAdvertiser']);
    Route::get('profile/{id}', ['middleware' => 'acl:advertiser_profile', 'as' => 'profile', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@profile']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_advertiser', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_advertiser', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@postUpdate']);
});
