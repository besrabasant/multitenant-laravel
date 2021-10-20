<?php

namespace Modules\AdminUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Modules\AdminUI\View\Components\Card;

class AdminUIServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('card', Card::class);
        });
    }

    private function registerComponent(string $name, string $class)
    {
        Blade::component('admin-ui::' . $name, $class);
        Blade::component('admin-ui-' . $name, $class);
    }
}
