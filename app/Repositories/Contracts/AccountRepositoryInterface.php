<?php

namespace App\Repositories\Contracts;

use App\Models\Account;

interface AccountRepositoryInterface
{
    public function create(array $data): Account;
    public function findByDomain(string $domain): ?Account;
    public function findBySubdomain(string $subdomain): ?Account;
    public function findById(string $id): ?Account;
    public function update(Account $account, array $data): bool;
    public function delete(Account $account): bool;
} 