<?php

namespace Modules\Tenancy\Domain;

use App\Models\Tenant;

interface TenancyCRUDServiceContract
{
    public function create(string $id): Tenant;
}
