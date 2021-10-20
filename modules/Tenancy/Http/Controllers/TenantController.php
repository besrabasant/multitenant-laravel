<?php

namespace Modules\Tenancy\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function create()
    {
        return view('modules.tenancy.application.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }
}
