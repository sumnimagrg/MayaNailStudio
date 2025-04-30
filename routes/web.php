<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortofolioImagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('MayaNailStudio/home');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('MayaNailStudio.blog');
});
Route::get('/review', function () {
    return view('MayaNailStudio.review');
})->name('review');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Appointment Booking Flow
    Route::get('/books', [AppointmentController::class, 'selectService'])->name('book');
    Route::post('/books', [AppointmentController::class, 'storeService'])->name('store.service');
    Route::get('/confirm', [AppointmentController::class, 'confirmPage'])->name('appointment.confirm');
    Route::post('/finalize-booking', [AppointmentController::class, 'finalizeAppointment'])->name('appointment.finalize');
    Route::post('/appointment/cancel/{id}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
    // payment
    Route::get('/pay', [PaymentController::class, 'pay'])->name('esewa.pay');
    Route::get('/payment/check', [PaymentController::class, 'check'])->name('esewa.check');
    Route::get('/payment/success', fn() => view('payment.success'))->name('payment.success');
    Route::get('/payment/{payment}/download', [PaymentController::class, 'download'])->name('payment.download');

    // message
    Route::post('/sendMessage', [ContactController::class, 'sendMessage'])->name('contact.send');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::resource('/employee', EmployeeController::class);
    Route::resource('/portofolioImages', PortofolioImagesController::class);
    Route::resource('/services', ServicesController::class);
    Route::resource('/serviceCategory', ServiceCategoryController::class);
    Route::resource('/appointment', AppointmentController::class);
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

Route::get('/', [FrontEndController::class, 'index']);
Route::get('/team', [FrontEndController::class, 'team']);
Route::get('/services', [FrontEndController::class, 'services']);
Route::get('/book', [FrontEndController::class, 'selectSer']);
Route::get('/selectEmp', [FrontEndController::class, 'selectEmp']);

Route::get('/portfolio/{id}', [PortofolioImagesController::class, 'showPortfolio'])->name('portfolio.show');



require __DIR__ . '/auth.php';
