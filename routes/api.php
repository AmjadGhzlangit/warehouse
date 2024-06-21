<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PharmacyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/dashboard', function () {
//    return view('admin.pages.index');
//});
//Route::get('/', [CustomerController::class, 'index'])->name('home');
//Route::get('/view-products', [CustomerController::class, 'indexProducts'])->name('view-products');
//Route::get('/show-product/{product}', [CustomerController::class, 'showProduct'])->name('show-products');
//Route::get('/cart/add/{id}', [CustomerController::class, 'addToCart'])->name('add-to-cart');
//
//Route::get('/cart', [CustomerController::class, 'viewCart'])->name('view-cart');
//Route::post('/cart/update', [CustomerController::class, 'updateCart'])->name('update-cart');
//Route::get('/cart/remove/{id}', [CustomerController::class, 'removeFromCart'])->name('remove-from-cart');
//Route::get('/checkout', [CustomerController::class, 'proceedToCheckout'])->name('checkout');
//
//Route::get('/order/create', [CustomerController::class, 'createOrder'])->name('create-order');
//
//Route::get('/order/{id}', [CustomerController::class, 'viewOrder'])->name('view-order');
//Route::get('/orders', [CustomerController::class, 'listOrders'])->name('list-orders');
//
//Route::get('/pharmacy/register', [PharmacyController::class, 'showRegistrationForm'])->name('pharmacy.register');
//Route::post('/pharmacy/register', [PharmacyController::class, 'register'])->name('pharmacy.register.submit');
//Route::middleware(['auth'])->group(function () {
//    Route::get('/cart', [CustomerController::class, 'viewCart'])->name('view-cart');
//    Route::post('/cart/update', [CustomerController::class, 'updateCart'])->name('update-cart');
//    Route::get('/cart/remove/{id}', [CustomerController::class, 'removeFromCart'])->name('remove-cart');
//});


//Route::prefix('admin')->group(function () {
//    Route::resource('categories', CategoryController::class)->names('admin.categories');
//    Route::resource('products', ProductController::class)->names('admin.products');
//    Route::resource('pharmacies', PharmacyController::class)->names('admin.pharmacies');
//    Route::get('active/pharmacy/{pharmacy}', [PharmacyController::class, 'activePharmacy'])->name('admin.pharmacies.active');
//});
//
//Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
//Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
//Route::get('/pharmacy/register', [PharmacyController::class, 'showPharmacyRegistrationForm'])->name('pharmacy.register');
//Route::post('/pharmacy/register', [PharmacyController::class, 'register'])->name('pharmacy.register.submit');
//
//Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
