<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Admin\RestaurantAdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES - HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', [RestaurantController::class, 'index'])
    ->name('home');

Route::get('/semua', [RestaurantController::class, 'semua'])
    ->name('restaurant.semua');

Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])
    ->name('restaurant.show');

Route::get('/search', [RestaurantController::class, 'search'])
    ->name('restaurant.search');

Route::post('/review/{id}', [RestaurantController::class, 'storeReview'])
    ->name('review.store');

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/users/create', function () {
    return view('users.create');
})->name('users.create');

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

/*
|--------------------------------------------------------------------------
| ADMIN AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN RESTAURANT MANAGEMENT ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/restaurants', [RestaurantAdminController::class, 'index'])
        ->name('admin.restaurants.index');

    Route::get('/restaurants/create', [RestaurantAdminController::class, 'create'])
        ->name('admin.restaurants.create');

    Route::post('/restaurants', [RestaurantAdminController::class, 'store'])
        ->name('admin.restaurants.store');

    Route::get('/restaurants/{id}/edit', [RestaurantAdminController::class, 'edit'])
        ->name('admin.restaurants.edit');

    Route::put('/restaurants/{id}', [RestaurantAdminController::class, 'update'])
        ->name('admin.restaurants.update');

    Route::delete('/restaurants/{id}', [RestaurantAdminController::class, 'destroy'])
        ->name('admin.restaurants.destroy');
});
