<?php

use App\Models\CMSPage;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\PayPalController;
use App\Http\Controllers\Front\StripeController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\FavouriteController;
use App\Http\Controllers\Front\FeatureAdController;
use App\Http\Controllers\Front\AdComplainController;
use App\Http\Controllers\Front\SocialAuthController;
use App\Http\Controllers\Front\AdvertisementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cc', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

Route::get('admin', ['uses' => '\App\Http\Controllers\Admin\AdminAuthController@getLogin'])->name('login');
Route::post('admin/login', ['as' => 'postLogin', 'uses' => '\App\Http\Controllers\Admin\AdminAuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Admin\AdminAuthController@getLogout']);

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => '\App\Http\Controllers\Admin\DashboardController@getIndex']);
    Route::get('admin-users', ['middleware' => 'acl:view_admin_user', 'as' => 'admin-user', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getIndex']);
    Route::get('admin-user/new', ['middleware' => 'acl:add_admin_user', 'as' => 'admin-user.new', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getCreate']);
    Route::post('admin-user/store', ['middleware' => 'acl:add_admin_user', 'as' => 'admin-user.store', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@postStore']);
    Route::get('admin-user/{id}/edit', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin-user.edit', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getEdit']);
    Route::post('admin-user/{id}/update', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin-user.update', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@putUpdate']);
    Route::get('admin-user/{id}/delete', ['middleware' => 'acl:delete_admin_user', 'as' => 'admin-user.delete', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getDelete']);

    Route::any('pwd/change/change/{id}', ['as' => 'admin.admin-user.password', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@passwordChange']);
    // Route::any('pwd/change/change/{id}', ['as' => 'admin.admin-user.password', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@passwordChange']);
    // User-Group
    Route::get('user-group', ['middleware' => 'acl:view_user_group', 'as' => 'user-group', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getIndex']);
    Route::get('user-group/new', ['middleware' => 'acl:new_user_group', 'as' => 'user-group.new', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getCreate']);
    Route::post('user-group/store', ['middleware' => 'acl:new_user_group', 'as' => 'user-group.store', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@postStore']);
    Route::get('user-group/{id}/edit', ['middleware' => 'acl:edit_user_group', 'as' => 'user-group.edit', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getEdit']);
    Route::post('user-group/{id}/update', ['middleware' => 'acl:edit_user_group', 'as' => 'user-group.update', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@putUpdate']);
    Route::get('user-group/{id}/delete', ['middleware' => 'acl:delete_user_group', 'as' => 'user-group.delete', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getDelete']);
    // User-Group
    Route::get('assign-access', ['middleware' => 'acl:assign_user_access', 'as' => 'assign-access', 'uses' => '\App\Http\Controllers\Admin\AssignAccessController@getIndex']);

    // Role
    Route::get('role', ['middleware' => 'acl:view_role', 'as' => 'role', 'uses' => '\App\Http\Controllers\Admin\RoleController@getIndex']);
    Route::get('role/new', ['middleware' => 'acl:add_role', 'as' => 'role.new', 'uses' => '\App\Http\Controllers\Admin\RoleController@getCreate']);
    Route::post('role/store', ['middleware' => 'acl:add_role', 'as' => 'role.store', 'uses' => '\App\Http\Controllers\Admin\RoleController@postStore']);
    Route::get('role/{id?}/edit', ['middleware' => 'acl:edit_role', 'as' => 'role.edit', 'uses' => '\App\Http\Controllers\Admin\RoleController@getEdit']);
    Route::post('role/{id}/update', ['middleware' => 'acl:edit_role', 'as' => 'role.update', 'uses' => '\App\Http\Controllers\Admin\RoleController@postUpdate']);
    Route::get('role/{id}/delete', ['middleware' => 'acl:delete_role', 'as' => 'role.delete', 'uses' => '\App\Http\Controllers\Admin\RoleController@getDelete']);
    // Permission-Group
    Route::get('permission-group', ['middleware' => 'acl:view_menu', 'as' => 'permission-group', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getIndex']);
    Route::get('permission-group/new', ['middleware' => 'acl:new_menu', 'as' => 'permission-group.new', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getCreate']);
    Route::post('permission-group/store', ['middleware' => 'acl:new_menu', 'as' => 'permission-group.store', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@postStore']);
    Route::get('permission-group/{id}/edit', ['middleware' => 'acl:edit_menu', 'as' => 'permission-group.edit', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getEdit']);
    Route::post('permission-group/{id}/update', ['middleware' => 'acl:edit_menu', 'as' => 'permission-group.update', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@putUpdate']);
    Route::get('permission-group/{id}/delete', ['middleware' => 'acl:delete_menu', 'as' => 'permission-group.delete', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getDelete']);
    //Permission
    Route::get('permission', ['middleware' => 'acl:view_action', 'as' => 'permission.index', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getIndex']);
    Route::get('permission/new', ['middleware' => 'acl:new_action', 'as' => 'permission.new', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getCreate']);
    Route::post('permission/store', ['middleware' => 'acl:new_action', 'as' => 'permission.store', 'uses' => '\App\Http\Controllers\Admin\PermissionController@postStore']);
    Route::get('permission/{id}/edit', ['middleware' => 'acl:edit_action', 'as' => 'permission.edit', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getEdit']);
    Route::post('permission/{id}/update', ['middleware' => 'acl:edit_action', 'as' => 'permission.update', 'uses' => '\App\Http\Controllers\Admin\PermissionController@putUpdate']);
    Route::get('permission/{id}/delete', '\App\Http\Controllers\Admin\PermissionController@getDelete')->name('permission.delete');

    Route::get('transaction', ['middleware' => 'acl:view_transactions', 'as' => 'transaction.index', 'uses' => '\App\Http\Controllers\Admin\TransactionController@getIndex']);

    require_once __DIR__ . '/admin/advertiser.php';
    require_once __DIR__ . '/admin/email.php';
    require_once __DIR__ . '/admin/settings.php';
    require_once __DIR__ . '/admin/gateways.php';
    require_once __DIR__ . '/admin/extra.php';
    require_once __DIR__ . '/admin/language.php';
    require_once __DIR__ . '/admin/frontend.php';
    require_once __DIR__ . '/admin/category.php';
    require_once __DIR__ . '/admin/brand.php';
    require_once __DIR__ . '/admin/city.php';
    require_once __DIR__ . '/admin/cms.php';

    Route::get('posted/ads', ['middleware' => 'acl:view_all_ads', 'as' => 'all.ads', 'uses' => '\App\Http\Controllers\Admin\AdvertisementController@getAllAds']);
    Route::get('posted/ad/edit/{id}', ['middleware' => 'acl:edit_admin_ad', 'as' => 'ad.edit', 'uses' => '\App\Http\Controllers\Admin\AdvertisementController@getEdit']);
    Route::post('posted/ad/update/{id}', ['middleware' => 'acl:edit_admin_ad', 'as' => 'ad.update', 'uses' => '\App\Http\Controllers\Admin\AdvertisementController@postUpdate']);
    Route::get('ads/report', ['middleware' => 'acl:view_ads_reports', 'as' => 'all.report', 'uses' => '\App\Http\Controllers\Admin\AdvertisementController@getReports']);
});


Route::group(['namespace' => 'Front', 'as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('change/{lang?}', [HomeController::class, 'changeLanguage'])->name('changeLanguage');

    // new
    Route::get('helps', [HomeController::class, 'helps'])->name('helps');
    Route::post('search/help', [HomeController::class, 'searchHelp'])->name('search.help');
    Route::get('{slug}/section', [HomeController::class, 'cmsSection'])->name('cms.section');
    // end
    Route::match(['get', 'post'], 'verify', [HomeController::class, 'verify'])->name('verify');
    Route::match(['get', 'post'], 'contact', [HomeController::class, 'contact'])->name('contact');
    Route::match(['get', 'post'], 'rating', [HomeController::class, 'rating'])->name('rating');

    Route::get('login/facebook', [SocialAuthController::class, 'facebookRedirect'])->name('facebook.redirect');
    Route::get('login/facebook/callback', [SocialAuthController::class, 'loginWithFacebook'])->name('facebook.login.callback');

    Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('login/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.login.callback');

    Route::post('message', [HomeController::class, 'sendMessage'])->name('sendMessage');
    Route::post('user/contacts', [HomeController::class, 'detailsSendMessage'])->name('detailsSendMessage');
    Route::post('user/msg/template', [HomeController::class, 'sendPrebuildMessage'])->name('sendPrebuildMessage');
    Route::get('message/{id}', [HomeController::class, 'getMessage'])->name('getMessage');
    route::post('delete-conversation-ajax', [HomeController::class, 'deleteConversationAjax']);
    route::post('delete-only-conversation-ajax', [HomeController::class, 'deleteOnlyConversationAjax']);
    route::post('block-user-ajax', [HomeController::class, 'blockUser']);
    route::post('/unblock-user-ajax', [HomeController::class, 'unblockUser']);
    route::post('mark-as-important-ajax', [HomeController::class, 'markAsImportant']);

    Route::get('unread-message/{id}', [HomeController::class, 'unreadMessage'])->name('unreadMessage');
    Route::get('search_message', [HomeController::class, 'searchMessage'])->name('searchMessage');

    Route::post('send/message', function (Request $request) {
        event(new MessageEvent($request->first_name, $request->messeges));
        return ['success' => true];
    });

    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe.form');
        Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


        Route::get('handle-payment', [PayPalController::class, 'index'])->name('paypal.index');
        Route::post('charge', [PayPalController::class, 'charge'])->name('paypal.charge');
        Route::get('paypal-success', [PayPalController::class, 'success'])->name('paypal.success');
        Route::get('error', [PayPalController::class, 'error'])->name('paypal.error');
    });

    Route::prefix('cron')->name('cron.')->group(function () {
        Route::get('fiat-rate', '\App\Http\Controllers\Front\CronController@fiatRate')->name('fiat.rate');
        Route::get('crypto-rate', '\App\Http\Controllers\Front\CronController@cryptoRate')->name('crypto.rate');
    });
    Route::post('check/email', [HomeController::class, 'checkEmail'])->name('email.check');
    Route::post('check/code', [HomeController::class, 'checkCode'])->name('code.check');
    Route::match(['get', 'post'], 'login', [UserController::class, 'getLogin'])->name('user.login');
    Route::match(['GET', 'POST'], 'forgot/password', [UserController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('resend/password-request', [UserController::class, 'resendPassword'])->name('resend.password');

    Route::prefix('user')->name('user.')->group(function () {
        Route::match(['get', 'post'], 'favourite/{id?}', [FavouriteController::class, 'addToFavourite'])->name('favourite');

        Route::get('public/profile/{id}', [UserController::class, 'sellerPublicProfile'])->name('public.profile');

        Route::middleware('advertiser')->group(function () {
            Route::get('my/ads', [AdvertisementController::class, 'dashboard'])->name('my_ads');
            Route::match(['get', 'post'], '/setting/{id}', [DashboardController::class, 'setting'])->name('setting');
            Route::match(['get', 'post'], '/profile-update/{id}', [DashboardController::class, 'profile'])->name('update.profile');
            Route::get('profile/{id}', [DashboardController::class, 'profileView'])->name('view.profile');
            Route::match(['get', 'post'], '/update/photo/{id?}', [DashboardController::class, 'profileUpdatePhoto'])->name('update.photo');
            Route::post('update/password', [DashboardController::class, 'updateCurrentPassword'])->name('update.password');
            Route::post('check-current-pwd', [DashboardController::class, 'check_current_pwd'])->name('check.password');
            Route::get('mobile-no/show/{id}/{show_mobile_no}', [DashboardController::class, 'chageMobileNoStatus'])->name('mobile.status');
            Route::get('post/ad', [AdvertisementController::class, 'postAd'])->name('post.ad');

            Route::delete('ad/delete/{id}', [AdvertisementController::class, 'getDelete'])->name('delete.ad');
            Route::get('ad/edit/{id}', [AdvertisementController::class, 'getEdit'])->name('edit.ad');
            Route::post('ad/update/{id}', [AdvertisementController::class, 'adUpdate'])->name('update.ad');

            Route::match(['get', 'post'], '/others/ad/{c_id}/{id?}', [AdvertisementController::class, 'nonSubCategoryAdPost'])->name('general.ad.manage');
            Route::match(['get', 'post'], '/others/ad/update/{c_id}/{ad_id}', [AdvertisementController::class, 'nonSubCategoryAdUpdate'])->name('general.ad.update');
            Route::match(['get', 'post'], '/remove/img/{id?}', [AdvertisementController::class, 'removeImage'])->name('remove.image');
            Route::match(['get', 'post'], '/remove/multi/img/{image_id}/{ad_id}', [AdvertisementController::class, 'removeMultiImage'])->name('remove.multi.image');

            Route::post('store/ad', [AdvertisementController::class, 'adStore'])->name('adStore');
            Route::get('payment/option', [FeatureAdController::class, 'paymentForm'])->name('payment.form');
            Route::match(['get', 'post'], 'proceed/to/pay', [FeatureAdController::class, 'proceedToPay'])->name('sellFaster');
            Route::match(['get', 'post'], '/manage/ad/{category_id}/{sub_category_id?}', [AdvertisementController::class, 'postAdForm'])->name('ad.form');

            Route::get('ad/category', [AdvertisementController::class, 'adCategoryId'])->name('category.id');
            Route::get('logout',  [UserController::class, 'logout'])->name('logout');
            Route::get('other/device/logout',  [UserController::class, 'authenticated'])->name('device.logout');
            Route::get('delete/{id}', [DashboardController::class, 'delete'])->name('delete');

            Route::get('chat', [DashboardController::class, 'chat'])->name('chat');
            Route::delete('chat/delete/all', [DashboardController::class, 'chatDeleteAll'])->name('all.chat.delete');
            Route::post('make/sold', [DashboardController::class, 'makeSold'])->name('makeSold');

            //delete all chat
            Route::get('delete-all-chat', [DashboardController::class, 'deleteAllChat']);
        });
    });

    Route::prefix('ads')->name('ads.')->group(function () {
        Route::get('category/{id}', [HomeController::class, 'categoryWiseAds'])->name('categorywise');
        Route::post('fetch/subcategory', [HomeController::class, 'fetchSubCategory'])->name('fetch.subcategory');
        Route::post('fetch/brand', [HomeController::class, 'fetchBrand'])->name('fetch.brand');
        Route::post('get/adds/by-category', [HomeController::class, 'getAddsByCategoryFilters'])->name('filter.result.category');
        Route::post('get/adds/by-sub-category', [HomeController::class, 'getAddsBySubCategoryFilters'])->name('filter.result.subcategory');
        Route::post('get/adds/brand', [HomeController::class, 'getAddsByBrandFilters'])->name('filter.result.brand');
        Route::post('get/adds/sort', [HomeController::class, 'getAddsBySortFilters'])->name('filter.result.sort');
        Route::post('get/adds/by/location', [HomeController::class, 'getAddsByLocation'])->name('allow.location');
        Route::post('check/fav', [HomeController::class, 'checkFav'])->name('check.fav');
        Route::get('sub/category/{id}', [HomeController::class, 'childCategoryAds'])->name('subcategorywise');
        Route::get('details/{slug}/{id}', [HomeController::class, 'details'])->name('details');
        // Route::get('all', [HomeController::class, 'allAds'])->name('see.all');
        Route::get('search', [HomeController::class, 'search'])->name('search');
        Route::get('auto/search', [HomeController::class, 'autoSearch'])->name('auto.search');
        Route::post('load/more/ads', [HomeController::class, 'loadMore'])->name('load.more');
        Route::post('complain', [AdComplainController::class, 'postComplain'])->name('complain');
        Route::get('city/{id}', [HomeController::class, 'cityWiseAds'])->name('cityWise');
    });
    Route::get('all', [HomeController::class, 'allAds'])->name('sort');
    Route::post('page/vote', [HomeController::class, 'pageVote'])->name('vote');
    Route::get('/test', function () {
        $date = strtotime("2022-11-27 12:25:47");
        $nextDate = date('Y-m-d', $date);
        dd($nextDate);
    });
    $cmsSlug = CMSPage::select('slug')->where('status', 1)->get()->pluck('slug')->toArray();
    foreach ($cmsSlug as $page_slug) {
        Route::get('/' . $page_slug, [HomeController::class, 'cms_page']);
    }
});
// test

