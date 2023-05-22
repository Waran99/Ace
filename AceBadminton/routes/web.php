<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramTypesController;
use App\Http\Controllers\ProgramSlotController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
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

//Homepage
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/service/{id}',[HomeController::class,'service_detail']);
//Route::get('page/about-us',[PageController::class,'about_us']);
//Route::get('page/contact-us',[PageController::class,'contact_us']);

Route::name('portal.')->prefix('portal')->group(function () {
    Route::get('login',[\App\Http\Controllers\PortalController::class, 'loginView']);
    Route::post('login',[\App\Http\Controllers\PortalController::class,'login']);
    Route::get('logout',[\App\Http\Controllers\PortalController::class,'logout']);
});
//Admin Dashboard
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('', [AdminController::class,'dashboard']);

    //ProgramTypes routes
    Route::resource('ProgramTypes',ProgramTypesController::class);
    Route::get('ProgramTypes/{id}/delete',[ProgramTypesController::class,'destroy']);

    //ProgramSlot routes
    Route::resource('ProgramSlot',ProgramSlotController::class);
    Route::get('ProgramSlot/{id}/delete',[ProgramSlotController::class,'destroy']);

    Route::resource('club', ClubController::class);

    // Customer
    Route::get('customer/{id}/delete',[CustomerController::class,'destroy']);
    Route::resource('customer',CustomerController::class);

    // Delete Image
    Route::get('programtypeimage/delete/{id}',[ProgramTypesController::class,'destroy_image']);

    // Booking
    Route::post('booking/get-programs',[BookingController::class,'getPrograms']);
    Route::get('booking/available-programslots/{start_date_slot}',[BookingController::class,'available_programslots']);
    Route::resource('booking',BookingController::class);
});

////Club Dashboard
Route::name('club.')->prefix('club')->group(function () {
    Route::get('', [\App\Http\Controllers\Club\ClubController::class,'dashboard']);

    //ProgramTypes routes
    Route::resource('ProgramTypes',\App\Http\Controllers\Club\ProgramTypesController::class);
    Route::get('ProgramTypes/{id}/delete',[\App\Http\Controllers\Club\ProgramTypesController::class,'destroy']);
    Route::post('program-type/delete-image/{id}', [\App\Http\Controllers\Club\ProgramTypesController::class,'delete_image']);

    //ProgramSlot routes
    Route::resource('ProgramSlot',\App\Http\Controllers\Club\ProgramSlotController::class);

    // Booking
    Route::post('booking/get-programs',[\App\Http\Controllers\Club\BookingController::class,'getPrograms']);
    Route::get('booking/available-programslots/{start_date_slot}',[\App\Http\Controllers\Club\BookingController::class,'available_programslots']);
    Route::resource('booking',\App\Http\Controllers\Club\BookingController::class);


    Route::get('{id}/delete',[ClubController::class,'destroy']);
    Route::resource('profile',ClubController::class);


});

////Customer Dashboard
Route::name('customer.')->prefix('customer')->group(function () {
    // Booking
    Route::post('booking/get-programs',[\App\Http\Controllers\Customer\BookingController::class,'getPrograms']);
    Route::get('booking/available-programslots/{start_date_slot}',[\App\Http\Controllers\Customer\BookingController::class,'available_programslots']);
//    Route::resource('booking',\App\Http\Controllers\Customer\BookingController::class);

    //view pages
    Route::get('book-program',[\App\Http\Controllers\Customer\BookingController::class,'createBookingView'])->name('book-program');
    Route::get('bookings', [\App\Http\Controllers\Customer\BookingController::class,'bookingsView'])->name('bookings');

    //Post do the booking
    Route::post('booking/create',[\App\Http\Controllers\Customer\BookingController::class,'store']);

//    Route::get('checkout', [Chec])->name('checkout');
    Route::name('checkout.')->prefix('checkout')->group(function () {
        Route::post('', [\App\Http\Controllers\CheckoutController::class, 'checkout']);
        Route::get('success', [\App\Http\Controllers\Customer\BookingController::class, 'successView'])->name('success');
        Route::get('cancel', [\App\Http\Controllers\Customer\BookingController::class, 'cancelView'])->name('cancel');
    });
});





//Customer/club
Route::get('login',[\App\Http\Controllers\AuthController::class,'loginView']);
Route::post('login',[\App\Http\Controllers\AuthController::class,'loginUser']);
Route::post('club',[\App\Http\Controllers\AuthController::class,'loginUser']);
Route::get('register',[\App\Http\Controllers\AuthController::class,'register']);
Route::get('logout',[\App\Http\Controllers\AuthController::class,'logout']);
//Route::post('customer/login',[CustomerController::class,'login']);
//Route::post('customer/login',[CustomerController::class,'customer_login']);
//Route::get('register',[CustomerController::class,'register']);
//Route::get('logout',[CustomerController::class,'logout']);


////Club Login
//Route::post('club/login',[\App\Http\Controllers\AuthController::class,'loginUser']);
//Route::get('club/register',[\App\Http\Controllers\AuthController::class,'register']);
//Route::get('club/logout',[\App\Http\Controllers\AuthController::class,'logout']);


Route::get('club',[HomeController::class,'club']);



Route::get('booking',[BookingController::class,'front_booking']);
Route::get('booking/success',[BookingController::class,'booking_payment_success']);
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);



//Club
Route::get('admin/club/{id}/delete',[ClubController::class,'destroy']);
Route::resource('admin/club',ClubController::class);


//Profile
Route::resource('/profile',ProfileController::class);


////Stripe Test
//Route::name('stripe.')->prefix('stripe')->group(function () {


//});
