<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MetaComposer;
use App\Models\SocialMedia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('frontend.layouts.main', MetaComposer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $activeTemplate = activeTemplate();
        $currency = Currency::select('currency_code', 'currency_symbol')->first();
        $general = GeneralSetting::with('currency')->first();

        $viewShare['general'] = $general ? $general : '';
        $viewShare['currency'] = $currency ? $currency : 'TL';
        $viewShare['currency'] = $currency ? $currency : 'TL';

        $viewShare['languages'] = Language::all();
        $viewShare['socials'] = DB::table('social_media')->where('status', '=', 1)->get();
        $viewShare['app_links'] = json_decode($general->apps_settings);
        $viewShare['activeTemplate'] = $activeTemplate ? $activeTemplate : '';
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        view()->share($viewShare);
        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });
		Paginator::useBootstrap();
    }
}
