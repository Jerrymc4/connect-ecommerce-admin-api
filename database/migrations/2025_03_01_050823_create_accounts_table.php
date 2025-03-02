<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Store name
            $table->string('slug')->unique(); // Unique identifier for URLs (e.g., my-store)
            $table->string('database')->unique(); // Database name for the account
            $table->string('domain')->unique()->nullable(); // Custom domain (optional)
            $table->string('subdomain')->unique()->nullable(); // Subdomain (e.g., my-store.myapp.com)
            $table->string('owner_name'); // Name of the account owner
            $table->string('owner_email')->unique(); // Owner's email for login
            $table->string('owner_phone')->nullable(); // Contact number
            $table->string('status')->default('active'); // active, suspended, canceled
            $table->json('settings')->nullable(); // Store config (JSON for future flexibility)
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // Allows account recovery
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
