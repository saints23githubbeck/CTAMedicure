<?php

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


Route::get('/delivery', function () {
   return view('admin.pages.delivery');
})->name('delivery');


Route::get('/completed/delivery', function () {
    return view('admin.pages.completed_delivery');
 })->name('completed_delivery');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');




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
   return view('admin.pages.location');

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

Route::get('/incoming', function () {
    return view('admin.order.incoming_request');

})->name('income');

Route::get('/payment', function () {
    return view('admin.order.payment');

})->name('payment');

Route::get('/order', function () {
    return view('admin.order.order');

})->name('order');

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



