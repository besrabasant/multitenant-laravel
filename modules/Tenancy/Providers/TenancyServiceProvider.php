<?php

namespace Modules\Tenancy\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Tenancy\Tenancy;

class TenancyServiceProvider extends ServiceProvider
{
    public function register()
    {
        Tenancy::registerExceptionHandlers();
    }

    public function boot()
    {

    }
}
