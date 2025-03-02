<?php

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    public function domains()
    {
        return $this->hasMany(\Stancl\Tenancy\Database\Models\Domain::class);
    }
}

