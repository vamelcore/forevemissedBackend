<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Contracts\RoleInterface::class,
            \App\Service\RoleService::class
        );
        $this->app->bind(
            \App\Contracts\InvitationInterface::class,
            \App\Service\InvitationService::class
        );
        $this->app->bind(
            \App\Contracts\InvitationMailInterface::class,
            \App\Service\InvitationMailService\InvitationMailToFileService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
