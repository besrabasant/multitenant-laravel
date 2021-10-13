<?php

namespace Modules\Frontend;


use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;

class Frontend
{
    public static function routes()
    {
        Route::get('/', HomeController::class);
    }
}
