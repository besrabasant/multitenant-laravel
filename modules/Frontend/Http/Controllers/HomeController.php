<?php

namespace Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('modules.frontend.home');
    }
}
