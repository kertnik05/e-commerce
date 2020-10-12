<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users/login', [UserController::class, 'login'])->name('user.login');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('users/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::post('users/{user}/add-role', [UserController::class, 'addRoleUser'])->name('users.add-role');
    Route::post('roles/{role}/add_permission', [RoleController::class, 'addRolePermission'])->name('role.add_permission');
    Route::delete('users/{user}/remove-role', [UserController::class, 'removeRoleUser'])->name('users.remove-role');
    Route::delete('roles/{role}/remove_permission', [RoleController::class, 'removeRolePermission'])->name('role.remove_permission');

    Route::apiResource('roles', RoleController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('shippers', ShipperController::class);
    Route::apiResource('payment_types', PaymentTypeController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('products', ProductController::class);
});
