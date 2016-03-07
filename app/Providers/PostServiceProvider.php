<?php

namespace App\Providers;

use App\Werashop\Post\EmsPost;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('post', function ($app) {
            return new EmsPost();
        });
    }
}
