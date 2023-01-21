<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

    Route::get('advertiser', ['middleware' => 'acl:view_all_advertiser', 'as' => 'advertiser', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@allAdvertiser']);

    Route::get('list', ['middleware' => 'acl:view_all_users', 'as' => 'all', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@allUsers']);
    //Route::get('active',  [ManageUsersController::class, 'activeUsers'])->name('active');
    Route::get('active', ['middleware' => 'acl:active', 'as' => 'active', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@activeUsers']);
    //Route::get('banned',  [ManageUsersController::class, 'bannedUsers'])->name('banned');
    Route::get('banned', ['middleware' => 'acl:view_banned_users', 'as' => 'banned', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@bannedUsers']);
    // Route::get('email-verified', [ManageUsersController::class, 'emailVerifiedUsers'])->name('email.verified');
    Route::get('email-verified', ['middleware' => 'acl:view_email_verified_users', 'as' => 'email.verified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@emailVerifiedUsers']);
    //Route::get('email-unverified',  [ManageUsersController::class, 'emailUnverifiedUsers'])->name('email.unverified');
    Route::get('email-unverified', ['middleware' => 'acl:view_email_unverified_users', 'as' => 'email.unverified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@emailUnverifiedUsers']);
    //Route::get('sms-unverified',  [ManageUsersController::class, 'smsUnverifiedUsers'])->name('sms.unverified');
    Route::get('sms-unverified', ['middleware' => 'acl:view_email_unverified_users', 'as' => 'sms.unverified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@smsUnverifiedUsers']);
    Route::get('sms-verified', ['middleware' => 'acl:view_sms_verified_users', 'as' => 'sms.verified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@smsVerifiedUsers']);
    Route::get('kyc-verified', ['middleware' => 'acl:view_sms_verified_users', 'as' => 'kyc.verified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@kycVerifiedUsers']);
    Route::get('kyc-unverified', ['middleware' => 'acl:view_sms_verified_users', 'as' => 'kyc.unverified', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@kycUnVerifiedUsers']);

    Route::get('with-balance', ['middleware' => 'acl:view_sms_verified_users', 'as' => 'with.balance', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@usersWithBalance']);
    Route::get('{scope}/search', ['middleware' => 'acl:search_users', 'as' => 'search', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@search']);

    //Route::get('{scope}/search', [ManageUsersController::class, 'search'])->name('search');

    //Route::get('user/detail/{id}', [ManageUsersController::class, 'detail'])->name('detail');
    Route::get('user/detail/{id}', ['middleware' => 'acl:search_users', 'as' => 'detail', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@detail']);

    // Route::post('update/{id}',  [ManageUsersController::class, 'update'])->name('update');
    Route::post('update/{id}', ['middleware' => 'acl:update_users', 'as' => 'update', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@update']);

    //Route::post('add-sub-balance/{id}',  [ManageUsersController::class, 'addSubBalance']);
    Route::post('add-sub-balance/{id}', ['middleware' => 'acl:user_add_sub_balance', 'as' => 'add.sub.balance', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@addSubBalance']);

    Route::get('send-email/{id}', ['middleware' => 'acl:update_users', 'as' => 'email.single.list', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@showEmailSingleForm']);
    Route::post('send-email/{id}', ['middleware' => 'acl:update_users', 'as' => 'email.single', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@showEmailSingleForm']);

    Route::get('send-email', ['middleware' => 'acl:user_send_email_list', 'as' => 'email.all', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@showEmailAllForm']);
    Route::post('send-email', ['middleware' => 'acl:users_send_email', 'as' => 'email.send', 'uses' => '\App\Http\Controllers\Admin\ManageUsersController@sendEmailAll']);
});
