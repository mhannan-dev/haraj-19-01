<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('index', ['middleware' => 'acl:view_category', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CategoryController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_category', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\CategoryController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_category', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CategoryController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_category', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\CategoryController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_category', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CategoryController@postUpdate']);
    Route::post('update-status', ['middleware' => 'acl:status_change_category', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CategoryController@postUpdateStatus']);
    Route::get('delete/{id}', ['middleware' => 'acl:delete_category', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CategoryController@getDelete']);
});
Route::group(['prefix' => 'type', 'as' => 'type.'], function () {
    Route::get('index', ['middleware' => 'acl:view_ad_type', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_type', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_type', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_type', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_type', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@postUpdate']);
    Route::post('status', ['middleware' => 'acl:type_status_change', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@statusUpdate']);
    Route::get('delete/{id}', ['middleware' => 'acl:delete_type', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\AdTypeController@getDelete']);
});

Route::group(['prefix' => 'category/item', 'as' => 'category-item.'], function () {
    Route::get('index', ['middleware' => 'acl:view_category_items', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_category_item', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_category_item', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_category_item', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@getEdit']);
    Route::post('update/{id}', ['middleware' => 'acl:edit_category_item', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@postUpdate']);
    Route::post('status', ['middleware' => 'acl:category_item_status_change', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@statusUpdate']);
    Route::get('delete/{id}', ['middleware' => 'acl:delete_category_item', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CategoryItemController@getDelete']);
});
