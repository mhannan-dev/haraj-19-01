<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'frontend', 'as' => 'frontend.'], function () {
    Route::get('templates', '\App\Http\Controllers\Admin\FrontendController@templates')->name('templates');
    Route::post('templates', '\App\Http\Controllers\Admin\FrontendController@templatesActive')->name('templates.active');

    Route::get('sections/{key}', '\App\Http\Controllers\Admin\FrontendController@frontendSections')->name('sections');
    Route::post('section/content/{key}', '\App\Http\Controllers\Admin\FrontendController@frontendContent')->name('sections.content');


    Route::get('element/{key}/{id?}', '\App\Http\Controllers\Admin\FrontendController@frontendElement')->name('sections.element');
    Route::post('remove', '\App\Http\Controllers\Admin\FrontendController@remove')->name('remove');
});
