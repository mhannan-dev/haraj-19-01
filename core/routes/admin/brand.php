<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
    Route::get('index', ['middleware' => 'acl:view_brand', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\BrandController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_brand', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\BrandController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_brand', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\BrandController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_brand', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\BrandController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_brand', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\BrandController@postUpdate']);
    Route::post('update-status', ['middleware' => 'acl:status_change_brand', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\BrandController@postUpdateStatus']);
    Route::get('delete/{id}', ['middleware' => 'acl:delete_brand', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\BrandController@getDelete']);
});
