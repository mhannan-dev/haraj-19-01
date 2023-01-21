<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
    Route::get('index', ['middleware' => 'acl:view_city', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CityController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_city', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\CityController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_city', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CityController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_city', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\CityController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_city', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CityController@postUpdate']);
    Route::post('status', ['middleware' => 'acl:city_status_change', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CityController@statusUpdate']);
    Route::get('delete/{id}', ['middleware' => 'acl:delete_city', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CityController@getDelete']);
});
