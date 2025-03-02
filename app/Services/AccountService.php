<?php

namespace App\Services;

use App\Models\Account;
use App\Repositories\Contracts\AccountRepositoryInterface;
use Illuminate\Support\Str;

class AccountService
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function createAccount(array $data): Account
    {
        // Generate slug if not provided
        if (!isset($data['slug']) && isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Generate database name if not provided
        if (!isset($data['database'])) {
            $data['database'] = 'tenant_' . $data['slug'];
        }

        // Generate subdomain if not provided
        if (!isset($data['subdomain'])) {
            $data['subdomain'] = $data['slug'] . '.localhost';
        }

        // Set default status if not provided
        if (!isset($data['status'])) {
            $data['status'] = 'active';
        }

        // Set default settings if not provided
        if (!isset($data['settings'])) {
            $data['settings'] = [
                'theme' => 'default',
                'currency' => 'USD'
            ];
        }

        return $this->accountRepository->create($data);
    }

    public function createTestAccount(): Account
    {
        $timestamp = now()->format('YmdHis');
        
        return $this->createAccount([
            'name' => 'Test Store',
            'slug' => 'test-store-' . $timestamp,
            'owner_name' => 'Test Owner',
            'owner_email' => 'test' . $timestamp . '@example.com',
            'owner_phone' => '1234567890'
        ]);
    }

    public function findByDomain(string $domain): ?Account
    {
        return $this->accountRepository->findByDomain($domain);
    }

    public function findBySubdomain(string $subdomain): ?Account
    {
        return $this->accountRepository->findBySubdomain($subdomain);
    }

    public function updateAccount(Account $account, array $data): bool
    {
        return $this->accountRepository->update($account, $data);
    }

    public function deleteAccount(Account $account): bool
    {
        return $this->accountRepository->delete($account);
    }
} 