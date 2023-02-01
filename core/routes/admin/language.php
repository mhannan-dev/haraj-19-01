<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'language', 'as' => 'language.'], function () {
    Route::get('list', ['middleware' => 'acl:language_view', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\LanguageController@index']);
    Route::post('store', ['middleware' => 'acl:language_create', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langStore']);
    Route::post('delete/{id}', ['middleware' => 'acl:language_delete', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langDel']);
    Route::post('update/{id}', ['middleware' => 'acl:language_edit', 'as' => 'manage.update', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langUpdate']);
    Route::get('translate/{id}', ['middleware' => 'acl:language_view', 'as' => 'key', 'uses' => '\App\Http\Controllers\Admin\LanguageController@translateLanguage']);
    Route::get('edit/{id}', ['middleware' => 'acl:language_edit', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\LanguageController@edit']);
    Route::post('import', ['middleware' => 'acl:import_language', 'as' => 'import', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langImport']);

    Route::group(['prefix' => 'key', 'as' => 'key.'], function () {
        Route::post('store/{id}', '\App\Http\Controllers\Admin\LanguageController@storeLanguageJson')->name('store');
        Route::post('delete/{id}', '\App\Http\Controllers\Admin\LanguageController@deleteLanguageJson')->name('delete');
        Route::post('update/{id}', '\App\Http\Controllers\Admin\LanguageController@updateLanguageJson')->name('update');
    });
});
