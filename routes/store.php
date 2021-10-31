<?php

use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\store\AdvertisementController;
use App\Http\Controllers\store\CategoryController;
use App\Http\Controllers\store\UserController;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;
use App\Models\Category;


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



Route::get('/', [HomeController::class, 'home'])->name('store.home');
Route::get('/advertisement/create', [AdvertisementController::class, 'create'])->name('store.advertisement.create');
Route::post('/advertisement/store', [AdvertisementController::class, 'store'])->name('store.advertisement.store');
Route::get('/{category:name}', [CategoryController::class, 'show'])->name('store.category.show');
route::get('/{category:name}/{advertisement}', [AdvertisementController::class, 'show'])->name('store.advertisement.show');
route::get('/user/{user}', [UserController::class, 'show'])->name('store.user.show');


