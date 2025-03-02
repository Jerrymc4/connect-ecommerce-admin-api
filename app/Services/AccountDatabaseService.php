<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Account; // 'Account' is your tenant model

class AccountDatabaseService
{
    public static function switchToAccount($domain)
    {
        $account = Account::where('domain', $domain)->orWhere('subdomain', $domain)->first();

        if ($account) {
            config(['database.connections.tenant.database' => $account->database]);
            DB::purge('tenant'); // Clear cached connection
            DB::reconnect('tenant'); // Reconnect with new database
            return $account;
        }

        return null; // Handle case where tenant isn't found
    }
}
