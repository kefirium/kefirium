<?php

namespace App\Providers;

use App\Domain\Auth\Client\AuthApi;
use App\Domain\Support\Apis\Configuration;
use App\Domain\User\Models\User;
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
        app()->singleton(User::class);

        $this->app->when(AuthApi::class)
            ->needs(Configuration::class)
            ->give(fn() => (new Configuration())->setHost(config('services.auth.host')));
    }
}
