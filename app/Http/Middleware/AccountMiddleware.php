<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Config;

class AccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        
        // Skip for central domain
        if (in_array($host, config('tenancy.central_domains', []))) {
            return $next($request);
        }

        // Find account by domain or subdomain
        $account = Account::where('domain', $host)
            ->orWhere('subdomain', $host)
            ->first();

        if (!$account) {
            abort(404, 'Account not found');
        }

        // Set the current tenant
        tenancy()->initialize($account);

        return $next($request);
    }
}
