<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'components.sidebar', 'App\Http\ViewComposers\CategoryComposer'
        );

        View::composer(
            'components.sidebar', 'App\Http\ViewComposers\LikeComposer'
        );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
