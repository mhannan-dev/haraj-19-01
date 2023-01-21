<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GeneralSettingController;

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('index', ['middleware' => 'acl:general_settings', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@index']);
    Route::post('update', ['middleware' => 'acl:general_settings', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@update']);
    Route::get('optimize', ['middleware' => 'acl:general_settings', 'as' => 'optimize', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@optimize']);
    Route::get('logo/icon', ['middleware' => 'acl:general_settings', 'as' => 'logo.icon.get', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@logoIcon']);
    Route::post('logo/icon', ['middleware' => 'acl:general_settings', 'as' => 'logo.icon.post', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@logoIconUpdate']);
    Route::get('seo/manage', ['middleware' => 'acl:manage_seo', 'as' => 'seo.page', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@seoPage']);
    Route::post('seo/update/{key}', ['middleware' => 'acl:manage_seo', 'as' => 'seo.update', 'uses' => '\App\Http\Controllers\Admin\GeneralSettingController@seoUpdate']);

    Route::group(['prefix' => 'apps', 'as' => 'apps.'], function () {
        Route::match(['get', 'post'], 'index', [GeneralSettingController::class, 'appsSettings'])->name('index');
    });

    Route::group(['prefix' => 'social/media', 'as' => 'social.media.'], function () {
        Route::get('list', ['middleware' => 'acl:view_social_media', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@getIndex']);
        Route::get('new', ['middleware' => 'acl:new_social_media', 'as' => 'create', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@getCreate']);
        Route::post('store', ['middleware' => 'acl:new_social_media', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@postStore']);
        Route::get('edit/{id}', ['middleware' => 'acl:edit_social_media', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@getEdit']);

        Route::post('update/{id}', ['middleware' => 'acl:update_social_media', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@postUpdate']);
        Route::post('status/change', ['middleware' => 'acl:status_change_social_media', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@statusChange']);
        Route::get('delete/{id}', ['middleware' => 'acl:delete_social_media', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\SocialMediaManager@getDelete']);
    });
});

Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
    Route::get('list', ['middleware' => 'acl:currency_view', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CurrencyController@currencies']);
    Route::match(['GET', 'POST'], 'currency/manage/{id?}', ['middleware' => 'acl:currency_add_edit', 'as' => 'manage', 'uses' => '\App\Http\Controllers\Admin\CurrencyController@addEditCurrency']);
    Route::post('status/change', ['middleware' => 'acl:currency_status_change', 'as' => 'status', 'uses' => '\App\Http\Controllers\Admin\CurrencyController@statusChange']);
    Route::post('api-key/update', ['middleware' => 'acl:currency_api_key_update', 'as' => 'api.update', 'uses' => '\App\Http\Controllers\Admin\CurrencyController@updateApiKey']);
});

