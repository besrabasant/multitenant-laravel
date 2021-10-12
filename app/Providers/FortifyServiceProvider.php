<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Stancl\Tenancy\Exceptions\NotASubdomainException;
use Stancl\Tenancy\Resolvers\DomainTenantResolver;
use Stancl\Tenancy\Tenancy;

class FortifyServiceProvider extends ServiceProvider
{

    /** Copy tenancy functions for usage with building fortify guard */

    /**
     * The index of the subdomain fragment in the hostname
     * split by `.`. 0 for first fragment, 1 if you prefix
     * your subdomain fragments with `www`.
     *
     * @var int
     */
    public static int $subdomainIndex = 0;


    protected function isSubdomain(string $hostname): bool
    {
        return Str::endsWith($hostname, config('tenancy.central_domains')) && !in_array($hostname, config('tenancy.central_domains'), true);
    }

    /** @return Exception|string */
    protected function makeSubdomain(string $hostname)
    {
        $parts = explode('.', $hostname);

        $isLocalhost = count($parts) === 1;
        $isIpAddress = count(array_filter($parts, 'is_numeric')) === count($parts);

        // If we're on localhost or an IP address, then we're not visiting a subdomain.
        $isACentralDomain = in_array($hostname, config('tenancy.central_domains'), true);
        $notADomain = $isLocalhost || $isIpAddress;
        $thirdPartyDomain = !Str::endsWith($hostname, config('tenancy.central_domains'));

        if ($isACentralDomain || $notADomain || $thirdPartyDomain) {
            return new NotASubdomainException($hostname);
        }

        return $hostname;
//        return $parts[static::$subdomainIndex];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(StatefulGuard::class, function () {
            /** @var Request $request */
            $request = app('request');

            $tenantDomain = $request->getHost();

            if ($this->isSubdomain($request->getHost())) {
                $tenantDomain = $this->makeSubdomain($request->getHost());

                if ($tenantDomain instanceof Exception) {
                    throw $tenantDomain;
                }

                /** @var Tenancy $tenancy */
                $tenancy = app(Tenancy::class);
                /** @var DomainTenantResolver $tenantResolver */
                $tenantResolver = app(DomainTenantResolver::class);


                if ($tenancy->initialized) {
                    return Auth::guard(config('fortify.guard', null));
                }

                $tenancy->initialize(
                    $tenantResolver->resolve(
                        $tenantDomain
                    )
                );

            }

            return Auth::guard(config('fortify.guard', null));
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
