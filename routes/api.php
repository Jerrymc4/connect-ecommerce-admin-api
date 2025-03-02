<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require __DIR__ . '/api/auth.php';
    require __DIR__ . '/api/products.php';
    require __DIR__ . '/api/orders.php';
    require __DIR__ . '/api/tenants.php';
});
