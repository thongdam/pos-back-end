<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes ( authentication)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (authentication Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Categories routes
    Route::apiResource('categories', CategoryController::class);

    // Products routes -  search routes  apiResource
    Route::get('/products/search', [ProductController::class, 'search']);
    Route::patch('/products/{product}/stock', [ProductController::class, 'updateStock']);
    Route::apiResource('products', ProductController::class);

    // Customers routes -  search routes  apiResource
    Route::get('/customers/search', [CustomerController::class, 'search']);
    Route::apiResource('customers', CustomerController::class);

    // Sales routes -  custom routes  apiResource
    Route::get('/sales/stats', [SaleController::class, 'stats']);
    Route::get('/sales/{sale}/receipt', [SaleController::class, 'receipt']);
    Route::post('/sales/{sale}/refund', [SaleController::class, 'refund']);
    Route::apiResource('sales', SaleController::class)->only(['index', 'store', 'show']);

    // Additional useful routes
    Route::get('/dashboard/stats', [SaleController::class, 'dashboardStats']);
    Route::get('/products/low-stock', [ProductController::class, 'lowStock']);
    Route::get('/sales/daily-report', [SaleController::class, 'dailyReport']);
});

// Fallback route  API
Route::fallback(function () {
    return response()->json([
        'message' => 'API endpoint not found.',
        'available_endpoints' => [
            'POST /api/login' => 'User login',
            'POST /api/register' => 'User registration',
            'GET /api/user' => 'Get current user (auth required)',
            'GET /api/products' => 'Get products (auth required)',
            'GET /api/categories' => 'Get categories (auth required)',
            'GET /api/customers' => 'Get customers (auth required)',
            'GET /api/sales' => 'Get sales (auth required)',
        ]
    ], 404);
});
