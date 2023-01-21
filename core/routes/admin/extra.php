<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'acl:extra', 'prefix' => 'extra', 'as' => 'extra.'], function () {
    Route::get('clear/cache', ['as' => 'clear.cache', 'uses' => '\App\Http\Controllers\Admin\ExtraSettingController@clearCache']);
    Route::get('system/info', ['as' => 'system.info', 'uses' => '\App\Http\Controllers\Admin\ExtraSettingController@systemInfo']);
});
Route::get('web/visiting/history', ['middleware' => 'acl:visiting_history', 'as' => 'visiting.history', 'uses' => '\App\Http\Controllers\Admin\ExtraSettingController@visitingHistory']);
