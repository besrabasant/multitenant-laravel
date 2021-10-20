<?php

namespace Modules\Tenancy\Domain;

use App\Models\Tenant;

interface TenantRepositoryContract
{
    public function store(array $data): Tenant;

    public function get(string $id): Tenant;

    public function update(array $data): bool;

    public function archive(string $id): bool;
}
