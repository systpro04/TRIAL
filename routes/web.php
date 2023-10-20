<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\News_Advisory_Interruption\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\RecycleBinController;
use App\Http\Controllers\News_Advisory_Interruption\AdvisoryController;
use App\Http\Controllers\News_Advisory_Interruption\InterruptionController;
use App\Http\Controllers\News_Advisory_Interruption\NewsController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\USER_VIEW\HomeController as Home;
use App\Http\Controllers\USER_VIEW\AboutController as About;
use App\Http\Controllers\USER_VIEW\ServicesController as Services;
use App\Http\Controllers\USER_VIEW\ACHLController as Other;
use App\Http\Controllers\USER_VIEW\NIAController;

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

    Route::get('/recycle-bin', [RecycleBinController::class, 'index'])->name('recyclebin');
    Route::put('/restore-record/{table}/{id}', [RecycleBinController::class, 'restoreRecord'])->name('restore-record');
    Route::delete('/permanent-delete-record/{table}/{id}', [RecycleBinController::class, 'permanentDeleteRecord'])->name('permanent-delete-record');

});

//USER_ROUTES
Route::get('/', [Home::class, 'home'])->name('user_home');
Route::get('/about', [About::class, 'index'])->name('user_about');
Route::get('/services', [Services::class, 'index'])->name('user_service');
Route::get('/awards', [Other::class, 'award'])->name('awards');
Route::get('/cores', [Other::class, 'core'])->name('cores');
Route::get('/leaders', [Other::class, 'leader'])->name('leaders');
Route::get('/history', [Other::class, 'history'])->name('history');
Route::get('/allnews', [NIAController::class, 'allnews'])->name('all_news');
Route::get('/allint', [NIAController::class, 'allint'])->name('all_interruptions');
Route::get('/alladv', [NIAController::class, 'alladv'])->name('all_advisories');
