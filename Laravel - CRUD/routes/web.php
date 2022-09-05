<?php

use App\Http\Controllers\AddProductFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', [HomeController::class, "index"])->name('home');

//Todo

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name('dashboard');
    Route::post('/add', [DashboardController::class, "add"])->name('dashboard.add');
    Route::get('/edit', [DashboardController::class, "edit"])->name('dashboard.edit');
    Route::post('/{product_id}/update', [DashboardController::class, "update"])->name('dashboard.update');
    Route::get('/{product_id}/delete', [DashboardController::class, "delete"])->name('dashboard.delete');
    Route::get('/{product_id}/status', [DashboardController::class, "status"])->name('dashboard.status');
});
