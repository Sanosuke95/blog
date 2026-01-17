<?php

namespace App\Providers;

use App\Services\Contacts\ContactService;
use App\Services\Contacts\ContactServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
