<?php

namespace App\Providers;

use App\Contracts\InvitationInterface;
use App\Contracts\RoleInterface;
use App\Service\InvitationService;
use App\Service\RoleService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class, RoleService::class);
        $this->app->bind(InvitationInterface::class, InvitationService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
