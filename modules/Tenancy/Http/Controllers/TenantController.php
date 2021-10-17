<?php

namespace Modules\Tenancy\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TenantController extends Controller
{
    public function create()
    {
        return Inertia::render('Application/Create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }
}
