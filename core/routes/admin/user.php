<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('advertiser', ['middleware' => 'acl:view_all_advertiser', 'as' => 'advertiser', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@allAdvertiser']);
});
