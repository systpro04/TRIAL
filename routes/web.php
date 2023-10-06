<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\News_Advisory_Interruption\NewsController;
use App\Http\Controllers\News_Advisory_Interruption\AdvisoryController;
use App\Http\Controllers\News_Advisory_Interruption\InterruptionController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/news','App\Http\Controllers\News_Advisory_Interruption\NewsController');
Route::resource('/advisories', 'App\Http\Controllers\News_Advisory_Interruption\AdvisoryController');
Route::resource('/interruptions', 'App\Http\Controllers\News_Advisory_Interruption\InterruptionController');
