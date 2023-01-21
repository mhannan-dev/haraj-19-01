<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SmsTemplateController;


Route::group(['prefix' => 'sms-template', 'as' => 'sms.template.'], function () {
    Route::get('global', 'SmsTemplateController@smsTemplate')->name('global');
    Route::post('global', 'SmsTemplateController@smsTemplateUpdate')->name('post.global');
    Route::get('setting','SmsTemplateController@smsSetting')->name('get.setting');

    Route::post('setting', 'SmsTemplateController@smsSettingUpdate')->name('setting');
    Route::get('index', 'SmsTemplateController@index')->name('index');
    Route::get('edit/{id}', 'SmsTemplateController@edit')->name('edit');
    Route::post('update/{id}', 'SmsTemplateController@update')->name('update');
    Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('test.sms');

});
