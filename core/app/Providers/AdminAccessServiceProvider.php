<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminAccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
    public function registerBindings()
    {
        $repos = [
            'UserGroup',
            'User',
            'PermissionGroup',
            'Permission',
            'Role',
            'Auth',
            'Dashboard',
            'AdminUser',
            'Advertiser',
            'Product',
            'Post',
            'CMS',
            'City',
            'Category',
            'CategoryType',
            'CategoryItem',
            'AdType',
            'SocialMedia',
            'Brand',
            'Contact',
        ];
        foreach ($repos as $repo) {
            $this->app->bind("App\Repositories\Admin\\{$repo}\\{$repo}Interface", "App\Repositories\Admin\\{$repo}\\{$repo}Abstract");
        }
    }

}
