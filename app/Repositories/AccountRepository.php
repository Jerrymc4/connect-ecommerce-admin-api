<?php

namespace App\Repositories;

use App\Models\Account;
use App\Repositories\Contracts\AccountRepositoryInterface;
use Illuminate\Support\Str;

class AccountRepository implements AccountRepositoryInterface
{
    public function create(array $data): Account
    {
        // Generate a UUID for the tenant
        $data['id'] = (string) Str::uuid();
        
        return Account::create($data);
    }

    public function findByDomain(string $domain): ?Account
    {
        return Account::where('domain', $domain)->first();
    }

    public function findBySubdomain(string $subdomain): ?Account
    {
        return Account::where('subdomain', $subdomain)->first();
    }

    public function findById(string $id): ?Account
    {
        return Account::find($id);
    }

    public function update(Account $account, array $data): bool
    {
        return $account->update($data);
    }

    public function delete(Account $account): bool
    {
        return $account->delete();
    }
} 