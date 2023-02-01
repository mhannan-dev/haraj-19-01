<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('pages', ['middleware' => 'acl:view_pages', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getIndex']);
    Route::get('create', ['middleware' => 'acl:create_page', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getCreate']);
    Route::post('store', ['middleware' => 'acl:create_page', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postStore']);
    Route::get('edit/{id}', ['middleware' => 'acl:edit_page', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getEdit']);

    Route::post('update/{id}', ['middleware' => 'acl:edit_page', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postUpdate']);
    Route::post('update-status', ['middleware' => 'acl:status_page',  'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@postUpdateStatus']);
    Route::get('delete-page/{id}', ['middleware' => 'acl:delete_page',  'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CMSPageController@getDelete']);
});
Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('index', ['middleware' => 'acl:view_contact_query', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ContactController@getIndex']);
    Route::any('reply/{id?}', ['middleware' => 'acl:contact_reply', 'as' => 'reply', 'uses' => '\App\Http\Controllers\Admin\ContactController@reply']);
});
