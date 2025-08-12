<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ReportsController;

// Redirect root to orders
Route::redirect('/', '/orders');

// Orders routes
Route::resource('orders', OrdersController::class)->only([
    'index', 'create', 'show', 'edit', 'store'
]);

// Clients routes
Route::resource('clients', ClientsController::class)->only([
    'index', 'show', 'edit', 'update', 'delete'
]);

// Reports routes
Route::resource('reports', ReportsController::class)->only([
    'index'
]);

// Logout route (placeholder)
Route::get('/logout', function () {
    // Add actual logout logic later
    return redirect()->route('orders.index');
})->name('logout');
