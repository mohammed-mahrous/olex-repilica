<?php

use App\Http\Controllers\dashboard\AdvertisementsController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;

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



// Route::get('/', [HomeController::class, 'dashboard'])->middleware(['auth']);

Route::prefix('dashboard')->middleware(['auth', 'can:view-dashboard'])->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/Advertisements', AdvertisementsController::class);
    #Route::get('/Advertisements/approved', [AdvertisementsController::class, 'approved'])->name('Advertisements.approved');
    #Route::get('/Advertisements/disapproved', [AdvertisementsController::class, 'disapproved'])->name('Advertisements.disapproved');
    Route::post('/Advertisements/{id}/approve', [AdvertisementsController::class, 'approve'])->name('Advertisements.approve');
    Route::post('/Advertisements/{id}/disapprove', [AdvertisementsController::class, 'disapprove'])->name('Advertisements.disapprove');
});