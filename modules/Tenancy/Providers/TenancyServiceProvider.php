<?php

namespace Modules\Tenancy\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Tenancy\Application\TenancyCRUDService;
use Modules\Tenancy\Domain\TenancyCRUDServiceContract;
use Modules\Tenancy\Domain\TenantRepositoryContract;
use Modules\Tenancy\Foundation\Repositories\TenantDBRepository;

class TenancyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TenantRepositoryContract::class, TenantDBRepository::class);

        $this->app->singleton(TenancyCRUDServiceContract::class, TenancyCRUDService::class);
    }

    public function boot()
    {
    }
}
