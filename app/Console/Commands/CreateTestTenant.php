<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AccountService;

class CreateTestTenant extends Command
{
    protected $signature = 'tenant:create-test';
    protected $description = 'Create a test tenant for development';

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        parent::__construct();
        $this->accountService = $accountService;
    }

    public function handle()
    {
        $tenant = $this->accountService->createTestAccount();

        $this->info('Test tenant created successfully!');
        $this->table(
            ['Key', 'Value'],
            [
                ['ID', $tenant->id],
                ['Name', $tenant->name],
                ['Subdomain', $tenant->subdomain],
                ['Database', $tenant->database],
                ['Owner Email', $tenant->owner_email]
            ]
        );
    }
} 