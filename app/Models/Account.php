<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Account extends BaseTenant implements TenantWithDatabase
{
    use HasFactory, HasDatabase, HasDomains;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'database',
        'domain',
        'subdomain',
        'owner_name',
        'owner_email',
        'owner_phone',
        'status',
        'settings',
        'data',
    ];

    protected $casts = [
        'settings' => 'json',
        'data' => 'json',
    ];

    public static function getCustomColumns(): array
    {
        return [
            'name',
            'slug',
            'database',
            'domain',
            'subdomain',
            'owner_name',
            'owner_email',
            'owner_phone',
            'status',
            'settings',
        ];
    }

    public function getAccountKeyName(): string
    {
        return 'id';
    }

    public function getAccountKey()
    {
        return $this->getAttribute($this->getAccountKeyName());
    }

    public function getTenantKeyName(): string
    {
        return 'id';
    }

    public function getTenantKey()
    {
        return $this->getAttribute($this->getTenantKeyName());
    }
}

