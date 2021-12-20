<?php

use Illuminate\Support\Facades\Route;



//use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AdminPortal\DashboardController;
use App\Http\Controllers\AdminPortal\PrescriptionController;


//use App\Http\Controllers\DashboardController;

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
Route::get('/payment', function () {
    return view('order.payment');
});
Route::get('/order', function () {
    return view('order.order');
});
Route::get('/request', function () {
    return view('order.incoming_request');
});
Auth::routes();


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/location', function () {
    return view('admin.location');
})->name('location');

Route::get('/prescription', function () {
    return view('admin.prescription');
})->name('prescription');

//return view('admin.pages.location');
//})->name('location');
Route::get('/appointments', function () {
    return view('admin.pages.appointment');
})->name('appointments');

Route::get('/prescriptions', function () {
    return view('admin.pages.prescription');
})->name('prescriptions');

Route::get('/users', function () {
    return view('admin.pages.user');
})->name('users');

Route::get('/roles', function () {
    return view('admin.pages.role');

})->name('roles');


