<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPortal\DashboardController;
use App\Http\Controllers\AdminPortal\PrescriptionController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name("dashboard");
    Route::get('/prescription', PrescriptionController::class)->name("prescription");
    
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/location', function () {
    return view('admin.location');
})->name('location');