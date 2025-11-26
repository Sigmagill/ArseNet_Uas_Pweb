<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\PaymentAdminController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\PromoController;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\OrderHistoryController;
use App\Http\Controllers\Customer\PaymentController as CustomerPayment;
use App\Http\Controllers\Customer\ProfileController;



// ===================== AUTH ===================== //
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', fn() => redirect()->route('login.form'));


// ===================== ADMIN ===================== //
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Paket internet
    Route::prefix('packages')->name('packages.')->group(function () {
        Route::get('/',          [PackageController::class, 'index'])->name('index');
        Route::get('/create',    [PackageController::class, 'create'])->name('create');
        Route::post('/store',    [PackageController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PackageController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [PackageController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [PackageController::class, 'delete'])->name('delete');
    });

    // Customer
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::get('/{id}/delete', [CustomerController::class, 'delete'])->name('delete');
    });

    // Pesanan
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/',          [OrderAdminController::class, 'index'])->name('index');
        Route::get('/{id}',      [OrderAdminController::class, 'show'])->name('show');
        Route::post('/{id}/update', [OrderAdminController::class, 'updateStatus'])->name('update');
        Route::get('/{id}/delete',  [OrderAdminController::class, 'delete'])->name('delete');
    });

    // Pembayaran
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/',       [PaymentAdminController::class, 'index'])->name('index');
        Route::get('/{id}',   [PaymentAdminController::class, 'show'])->name('show');
        Route::post('/{id}/update', [PaymentAdminController::class, 'update'])->name('update');
    });

    // Laporan
    Route::prefix('reports')->name('reports.')->group(function () {
        // PDF
        Route::get('/customers/pdf', [ReportController::class, 'customersPdf'])->name('customers.pdf');
        Route::get('/orders/pdf',    [ReportController::class, 'ordersPdf'])->name('orders.pdf');
        Route::get('/payments/pdf',  [ReportController::class, 'paymentsPdf'])->name('payments.pdf');

        // Excel
        Route::get('/customers/excel', [ReportController::class, 'customersExcel'])->name('customers.excel');
        Route::get('/orders/excel',    [ReportController::class, 'ordersExcel'])->name('orders.excel');
        Route::get('/payments/excel',  [ReportController::class, 'paymentsExcel'])->name('payments.excel');
    });
    Route::get('/profile',  [\App\Http\Controllers\Admin\AdminProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'update'])
        ->name('profile.update');

        Route::prefix('promos')->name('promos.')->group(function () {
            Route::get('/', [PromoController::class, 'index'])->name('index');
            Route::get('/create', [PromoController::class, 'create'])->name('create');
            Route::post('/store', [PromoController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PromoController::class, 'edit'])->name('edit');
            Route::post('/{id}/update', [PromoController::class, 'update'])->name('update');
            Route::get('/{id}/delete', [PromoController::class, 'delete'])->name('delete');
        });
});

// Promo Routes //




// ===================== CUSTOMER ===================== //
Route::middleware('customer')->prefix('customer')->name('customer.')->group(function () {

    Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('dashboard');

    // Order paket
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/',        [CustomerOrder::class, 'index'])->name('index');
        Route::get('/{id}',    [CustomerOrder::class, 'create'])->name('create');
        Route::post('/store',  [CustomerOrder::class, 'store'])->name('store');
    });

    // Riwayat pesanan
    Route::get('/orders', [OrderHistoryController::class, 'index'])->name('orders.index');

    // Pembayaran
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/{order_id}', [CustomerPayment::class, 'create'])->name('create');
        Route::post('/store',     [CustomerPayment::class, 'store'])->name('store');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});


