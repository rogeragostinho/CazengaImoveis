<?php

namespace App\Providers;

use App\Models\Site;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $site = Site::find(1);
        
        } catch (\Throwable $th) {
            $site = [];
        }
        view()->share(['site' => $site]);   
    }
}
