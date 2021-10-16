<?php

namespace Modules\Tenancy;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedOnDomainException;

class Tenancy
{
    public static function registerExceptionHandlers()
    {
        /** @var ExceptionHandler $exceptionHandler */
        $exceptionHandler = resolve(ExceptionHandler::class);

        $exceptionHandler->renderable(function (TenantCouldNotBeIdentifiedOnDomainException $e, Request $request) {
            return response()->view(
                'modules.tenancy.errors.unidentified-domain',
                compact('e', 'request'),
                500
            );
        });
    }
}
