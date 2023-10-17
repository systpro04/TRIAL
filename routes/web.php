<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\News_Advisory_Interruption\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\News_Advisory_Interruption\AdvisoryController;
use App\Http\Controllers\News_Advisory_Interruption\InterruptionController;
use App\Http\Controllers\News_Advisory_Interruption\NewsController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\USER_VIEW\HomeController as Home;
use App\Http\Controllers\USER_VIEW\AboutController as About;

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

Route::get('/', function () {
    return view('USER_VIEW.Home.index');
});

Auth::routes();
//ADMIN_ROUTES

Route::group(['middleware' => ['role:Super-Admin|Admin']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/store', [HomeController::class, 'store'])->name('store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/news','App\Http\Controllers\News_Advisory_Interruption\NewsController');
    Route::resource('/advisories', 'App\Http\Controllers\News_Advisory_Interruption\AdvisoryController');
    Route::resource('/interruptions', 'App\Http\Controllers\News_Advisory_Interruption\InterruptionController');
    Route::resource('/upload', 'App\Http\Controllers\UploadController');
    Route::resource('/link', 'App\Http\Controllers\LinkController');

    Route::get('search', [InquiryController::class, 'index'])->name('index');
    Route::get('searchData', [InquiryController::class, 'search'])->name('search');
});

//USER_ROUTES
Route::get('/home', [Home::class, 'index'])->name('user_home');
Route::get('/about', [About::class, 'index'])->name('user_about');