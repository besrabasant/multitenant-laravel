<?php

namespace Modules\Tenancy\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TenantController extends Controller
{
    public function create() {
        return Inertia::render('Application/Create');
    }
}
