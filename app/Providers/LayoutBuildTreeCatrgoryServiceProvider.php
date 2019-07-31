<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LayoutBuildTreeCatrgoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // dang ky helpers
        require_once app_path() . '/Helpers/Common/BuildTreeCate.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
