<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Admin\RestaurantAdminController;
use App\Http\Controllers\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| AUTH ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'loginForm'])
    ->name('login'); // ⬅️ PENTING

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN RESTAURANT (TANPA AUTH DULU BIAR AMAN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    Route::get('/restaurants', [RestaurantAdminController::class, 'index']);
    Route::get('/restaurants/create', [RestaurantAdminController::class, 'create']);
    Route::post('/restaurants', [RestaurantAdminController::class, 'store']);
    Route::get('/restaurants/{id}/edit', [RestaurantAdminController::class, 'edit']);
    Route::put('/restaurants/{id}', [RestaurantAdminController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantAdminController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/
Route::get('/', [RestaurantController::class,'index']);
Route::get('/restaurant/{restaurant}', [RestaurantController::class,'show'])
    ->name('restaurant.show');

Route::post('/review/{id}', [RestaurantController::class,'storeReview']);

Route::get('/semua', [RestaurantController::class, 'semua'])
    ->name('restaurant.semua');

Route::get('/search', [RestaurantController::class, 'search'])
    ->name('restaurant.search');
