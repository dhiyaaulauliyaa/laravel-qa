<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('update-question', function ($user, $question) {
            return $user->id === $question->user_id;
        });
        
        Gate::define('delete-question', function ($user, $question) {
            return $user->id === $question->user_id;
        });
    }
}
