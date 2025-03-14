<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AisleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Aisles
Route::apiResource('aisles', AisleController::class);
Route::get('/aisles/{aisle}/products', [AisleController::class, 'products']);
Route::get('/aisles/{aisle}/products/popular', [AisleController::class, 'popularProducts']);
Route::get('/aisles/{aisle}/products/promotion', [AisleController::class, 'promotionProducts']);

// Categories
Route::apiResource('categories', CategoryController::class);
Route::get('/categories/{category}/products', [CategoryController::class, 'products']);

// Products
Route::apiResource('products', ProductController::class);

// Sales
// Route::apiResource('sales', SaleController::class)->except(['update']);
    
    // Admin only routes
    // Route::middleware('admin')->group(function () {
    //     // Stock Alerts
    //     Route::get('/stock-alerts', [StockAlertController::class, 'index']);
    //     Route::put('/stock-alerts/{alert}', [StockAlertController::class, 'update']);
        
    //     // Statistics
    //     Route::get('/statistics', [StatisticsController::class, 'index']);
    //     Route::post('/statistics/refresh', [StatisticsController::class, 'refreshStatistics']);
    // });