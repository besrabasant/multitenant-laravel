<?php

namespace Modules\Tenancy\Foundation\Repositories;

use App\Models\Tenant;
use Modules\Tenancy\Domain\TenantRepositoryContract;

class TenantDBRepository implements TenantRepositoryContract
{

    public function store(array $data): Tenant
    {
        // TODO: Implement store() method.
    }

    public function get(string $id): Tenant
    {
        // TODO: Implement get() method.
    }

    public function update(array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function archive(string $id): bool
    {
        // TODO: Implement archive() method.
    }
}
