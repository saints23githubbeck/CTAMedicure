<?php

use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/delivery', function () {
   return view('admin.pages.delivery');
})->name('delivery');

Route::get('/completed/delivery', function () {
    return view('admin.pages.completed_delivery');
 })->name('completed_delivery');

 Route::get('/detail/modal', function () {
    return view('admin.pages.detail_modal');
 })->name('detail_modal'); 

 Route::get('/orderlist', function () {
    return view('admin.pages.orderlist');
 })->name('orderlist'); 
 
 Route::get('/billing_info', function () {
    return view('admin.pages.billing_info');
 })->name('billing_info'); 



Route::get('/location', function () {
   return view('admin.location');
})->name('location');
//prescription start


Route::get('/prescription',[PrescriptionController::class,'index'])->name('prescription');
Route::post('/add/prescription',[PrescriptionController::class,'insert'])->name('add.prescription');

//prescription end

Route::get('/appointments', function () {
    return view('admin.pages.appointment');
})->name('appointments');

Route::get('/prescriptions', function () {
    return view('admin.pages.prescription');
})->name('prescriptions');

Route::get('/users', function () {
    return view('admin.pages.user');
})->name('users');

Route::get('/request-list', function () {
    return view('admin.pages.request-list');
})->name('requestList');

Route::prefix('admin')->group(function () {


    Route::get('/dashboard/show','DashboardController@dashboard')->name('dashboard.show');

    Route::prefix('role')->group(function () {

        Route::post('/add', 'RoleController@store')->name('role.add');

        Route::get('/show', 'RoleController@show')->name('roles.show');

        Route::patch('/{role}/update', 'RoleController@update')->name('role.update');

        Route::delete('/{role}/delete', 'RoleController@destroy')->name('role.destroy');

        Route::post('/search', 'RoleController@search')->name('role.search');


    });
});

Auth::routes();
