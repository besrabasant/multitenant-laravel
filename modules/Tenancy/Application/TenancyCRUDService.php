<?php

namespace Modules\Tenancy\Application;

use App\Models\Tenant;
use Modules\Tenancy\Domain\TenancyCRUDServiceContract;
use Modules\Tenancy\Domain\TenantRepositoryContract;

class TenancyCRUDService implements TenancyCRUDServiceContract
{
    public function __construct(
        private TenantRepositoryContract $repository
    )
    {
    }

    /**
     * @param string $id
     * @return \App\Models\Tenant
     */
    public function create(string $id): Tenant
    {
        $data = [
            'id' => $id
        ];

        return $this->repository->store($data);
    }
}
