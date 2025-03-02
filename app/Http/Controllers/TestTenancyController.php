<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestTenancyController extends Controller
{
    public function index()
    {
        return response()->json([
            'tenant_id' => tenant('id'),
            'database' => config('database.connections.' . DB::getDefaultConnection() . '.database'),
            'connection' => DB::getDefaultConnection(),
            'tenant_info' => tenant(),
        ]);
    }

    public function testDatabase(Request $request)
    {
        // Create a test item
        DB::table('test_items')->insert([
            'name' => 'Test Item for ' . tenant('id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Retrieve all items
        $items = DB::table('test_items')->get();

        return response()->json([
            'tenant_id' => tenant('id'),
            'items' => $items,
        ]);
    }
} 