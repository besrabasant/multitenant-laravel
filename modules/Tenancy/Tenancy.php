<?php

namespace Modules\Tenancy;

use App\Exceptions\Handler;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Tenancy\Http\Controllers\TenantController;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedOnDomainException;

class Tenancy
{
    /**
     * Usage:
     *
     * In the register method of your `App\Exceptions\Handler` class.
     *
     * ```php
     *
     * public function register() {
     *      \Modules\Tenancy\Tenancy::registerExceptionHandlers($this);
     * }
     *
     * ```
     *
     * @param Handler $exceptionHandler
     */
    public static function registerExceptionHandlers(Handler $exceptionHandler)
    {
        $exceptionHandler->renderable(function (TenantCouldNotBeIdentifiedOnDomainException $e, Request $request) {
            return response()->view(
                'modules.tenancy.errors.unidentified-domain',
                compact('e', 'request'),
                500
            );
        });
    }


    /**
     * Usage:
     *
     * In your `routes\web.php` file.
     *
     * ```php
     *
     * \Modules\Tenancy\Tenancy::routes();
     *
     * ```
     */
    public static function routes()
    {
        Route::middleware(['auth:sanctum', 'verified'])->group(function () {

            Route::get('/application/create', [TenantController::class, 'create'])->name('application.create');
            Route::post('/application', [TenantController::class, 'store'])->name('application.store');

        });
    }
}
