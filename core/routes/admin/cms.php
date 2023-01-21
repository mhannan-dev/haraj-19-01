<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('pages', ['middleware' => 'acl:view_pages', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getIndex']);
    Route::get('create', ['as' => 'create', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getCreate']);
    Route::post('store', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postStore']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getEdit']);

    Route::post('update/{id}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postUpdate']);
    Route::post('update-status', ['as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postUpdateStatus']);
    Route::get('delete-page/{id}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getDelete']);
});
Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('index', ['middleware' => 'acl:view_contact_query', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ContactController@getIndex']);
});
