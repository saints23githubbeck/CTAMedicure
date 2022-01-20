<?php


use App\Http\Controllers\PaymentController;

use App\Http\Controllers\ConsultancyController;

use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DeliveryController;
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



Route::get('/pay/{id}', [PaymentController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::post('/callback', [PaymentController::class, 'callback'])->name('callback');
Route::get('/pay/mobile/{id}', [PaymentController::class, 'mobile'])->name('pay.mobile');
// The callback url after a payment
Route::get('/callback/mobile', [PaymentController::class, 'callbackm'])->name('callback.mobile');
Route::get('/request', function () {
    return view('order.incoming_request');
});
Auth::routes();

/*Delivary start */

// Route::get('/delivery', function () {
//     return view('admin.pages.delivery');
// })->name('delivery');

Route::get('/delivery', [DeliveryController::class,'index'])->name('delivery');
Route::post('/delivary_approved',[DeliveryController::class,'approved'])->name('delivary_approved');


/*Delivary end*/


Route::get('/completed/delivery', function () {
    return view('admin.pages.completed_delivery');
 })->name('completed_delivery');


Route::get('/doctor_list', function () {
    return view('admin.pages.doctor_list');
 })->name('doctor_list');

 Route::get('/order_status', function () {
    return view('admin.pages.order_status');
 })->name('order_status');


 Route::get('/order_coupon', function () {
    return view('admin.pages.order_coupon');
 })->name('order_coupon');


 Route::get('/pharmacy_list', function () {
    return view('admin.pages.pharmacy_list');
 })->name('pharmacy_list');


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



 Route::get('/orderlist', function () {
    return view('admin.pages.orderlist');
 })->name('orderlist');

 Route::get('/billing_info', function () {
    return view('admin.pages.billing_info');
 })->name('billing_info');


//location

Route::get('/location/{order_id}',[LocationController::class,'index'])->name('location');
Route::get('/admin/location',[LocationController::class,'location'])->name('location');
Route::post('/location/add',[LocationController::class,'insert'])->name('location.store');
Route::post('/location/{order}',[LocationController::class,'add'])->name('location.add');
Route::post('/edit/admin/location',[LocationController::class,'update_admin'])->name('update.admin_location');


// Route::get('/location', function () {
//    return view('admin.pages.location');

// })->name('location');

// Route::get('/prescription', function () {
//     return view('admin.prescription');
// })->name('prescription');

//prescription start


Route::get('/prescription',[PrescriptionController::class,'index'])->name('pres');
//Route::post('/filter/prescription',[PrescriptionController::class,'filter'])->name('filter.prescription');
Route::delete('/prescription/{order}/delete',[PrescriptionController::class,'destroy'])->name('prescription.destroy');
Route::get('/view/prescription/{order_id}',[PrescriptionController::class,'view'])->name('view.prescription');
Route::get('/edit/prescription/{order_id}',[PrescriptionController::class,'edit'])->name('edit.prescription');
Route::get('/status/prescription/{order_id}',[PrescriptionController::class,'status'])->name('status.prescription');
Route::patch('/prescription/{order}/update',[PrescriptionController::class,'update'])->name('update.prescription');
Route::post('/add/prescription',[PrescriptionController::class,'insert'])->name('add.prescription');
Route::post('/prescription/accerpt/{order}',[PrescriptionController::class,'accerpt'])->name('prescription.accerpt');
Route::get('/prescription/location/{order}',[PrescriptionController::class,'checkout'])->name('prescription.checkout');
Route::get('/prescription/checkout/{order}',[PrescriptionController::class,'checkoutWithLocation'])->name('prescription.checkout.location');

Route::post('/prescription/reject/{order}',[PrescriptionController::class,'reject'])->name('prescription.reject');
Route::get('/prescription/show',[PrescriptionController::class,'showRequest'])->name('prescription.show');
Route::post('/prescription/{order}/confirm',[PrescriptionController::class,'approve'])->name('prescription.confirm');
Route::post('/change/prescription/location',[PrescriptionController::class,'change_order_location'])->name('change.location');
Route::get('payment/{id}',[PaymentController::class,'index'])->name('payment.details');
Route::get('delivery/{id}',[PaymentController::class,'delivery'])->name('payment.delivery');

Route::get('cash/delivery/{id}/{charge}',[PaymentController::class,'cashondelivery'])->name('payment.cashondelivery');

Route::get('cash/delivery/{id}',[PaymentController::class,'cashondelivery'])->name('payment.cashondelivery');
Route::get('/admin/location',[PrescriptionController::class,'admin_location'])->name('admin.location');
Route::post('/admin/location/change',[PrescriptionController::class,'admin_location_change'])->name('admin.location.change');
Route::post('/admin/location/add',[PrescriptionController::class,'admin_location_add'])->name('admin.location.add');

//prescription end

//return view('admin.pages.location');
//})->name('location');

Route::get('/prescriptions', function () {
    return view('admin.pages.prescription');
})->name('prescriptions');
//

// Route::get('/users', function () {
//     return view('admin.pages.user');
// })->name('users');

//Route::get('/users', function () {
//    return view('admin.pages.user');
//})->name('users');


Route::get('/roles', function () {
    return view('admin.pages.role');

})->name('roles');

Route::get('/incoming', function () {
    return view('admin.order.incoming_request');

})->name('income');


Route::get('/order', function () {
    return view('admin.order.order');

})->name('order');




Route::get('/roles', function () {
    return view('admin.pages.role');

})->name('roles');

Route::get('/incoming', function () {
    return view('admin.order.incoming_request');

})->name('income');


Route::get('/order', function () {
    return view('admin.order.order');

})->name('order');


Route::get('/request-list', function () {
    return view('admin.pages.request-list');
})->name('requestList');

Route::prefix('admin')->group(function () {


    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard.show');

    Route::prefix('role')->group(function () {

        Route::post('/add', 'RoleController@store')->name('role.add')->middleware(['auth','can:isAdmin,App\Models\Role']);

        Route::get('/show', 'RoleController@show')->name('roles.show')->middleware(['auth','can:isAdmin,App\Models\Role']);

        Route::patch('/{role}/update', 'RoleController@update')->name('role.update')->middleware(['auth','can:isAdmin,App\Models\Role']);

        Route::delete('/{role}/delete', 'RoleController@destroy')->name('role.destroy')->middleware(['auth','can:isAdmin,App\Models\Role']);

        Route::post('/search', 'RoleController@search')->name('role.search')->middleware(['auth','can:isAdmin,App\Models\Role']);
    });

    Route::prefix('user')->group(function () {

        Route::get('/index', 'UserController@index')->name('users')->middleware(['auth','can:isAdmin,App\Models\User']);
        Route::get('/delete/{id}', 'UserController@destroy')->name('users.destroy')->middleware(['auth','can:isAdmin,App\Models\User']);
        Route::patch('/{id}/update', 'UserController@update')->name('user.update')->middleware(['auth','can:isAdmin,App\Models\User']);
        Route::post('update', 'UserController@store')->name('user.store')->middleware(['auth','can:isAdmin,App\Models\User']);

    });
});

// Appoinment controller
Route::get('/appointments',[ConsultancyController::class,'appointmentPage'])->name('appointments')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::get('/appointments/list',[ConsultancyController::class,'appointmentList'])->name('appointment.list')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::post('/appointment/add',[ConsultancyController::class,'store'])->name('appointment.add')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::delete('/appointment/{appointment}/delete',[ConsultancyController::class,'destroy'])->name('appointment.destroy')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::patch('/appointment/{appointment}/update',[ConsultancyController::class,'update'])->name('appointment.update')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::post('/apoinment-update',[ConsultancyController::class,'apoinmentUpdate'])->name('appoinmentUpdate')->middleware(['auth','can:update,App\Models\Consultancy']);
Route::get('/apoinment-search',[ConsultancyController::class,'appoinSearch'])->name('appoinSearch')->middleware(['auth','can:update,App\Models\Consultancy']);
