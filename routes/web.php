<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ListCakeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', [HomeController::class, 'returnViewHome'])->name('home');
Route::get('/uploadslidepage', function () {
    return view('uploadslide');
})->middleware('auth')->name('uploadslidepage');
Route::get('/uploadcakepage', [ListCakeController::class, 'getListCategoryCake'])->middleware('auth')->name('uploadcakepage');
Route::post('/uploadsliderequest', [SlideController::class, 'addASlide'])->name('UploadSlideRequest');
Route::post('/uploadcakerequest', [ListCakeController::class, 'addACake'])->name('UploadCakeRequest');
Route::post('/uploadcategory', [CategoryController::class, 'addAcategory'])->name('UploadCategoryRequest');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/loginrequest', [UserController::class, 'handleLogin'])->name('loginrequest');
Route::get('/logoutrequest', [UserController::class, 'handleLogout'])->name('logout');
Route::get('/setsession', [SessionController::class, 'setSession']);
Route::get('/getsession', [SessionController::class, 'getSession']);
Route::get('/dashboard', [DashboardController::class, 'loadPage'])->name('dashboard')->middleware('auth');
Route::get('/deleteacake/{id}', [ListCakeController::class, 'deleteACakeById'])->middleware('auth');
Route::get('/deleteaslide/{id}', [ListCakeController::class, 'removeASlide'])->middleware('auth');
