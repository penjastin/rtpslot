<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $site_meta = \DB::table('sitelists')->where('site_name', env('AGENT'))->first();
            $site_meta = json_decode(json_encode($site_meta), true);
            $view->with('site_meta', $site_meta);
        });
    }
}
