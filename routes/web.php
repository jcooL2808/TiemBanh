<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    //Normal Users Routes List

    Route::get('/', [HomeController::class, 'index'])->name('/');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});



   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {

       //Product
       Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    //Customer
    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('', 'index')->name('customers');
        Route::get('create', 'create')->name('customers.create');
        Route::post('store', 'store')->name('customers.store');
        Route::get('show/{id}', 'show')->name('customers.show');
        Route::get('edit/{id}', 'edit')->name('customers.edit');
        Route::put('edit/{id}', 'update')->name('customers.update');
        Route::delete('destroy/{id}', 'destroy')->name('customers.destroy');
    });


    Route::get('/cart', [ProductController::class, 'productCart'])->name('cart');
    Route::get('/product/{id}', [ProductController::class, 'addProducttoCart'])->name('addproduct.to.cart');
    Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.sopping.cart');
    Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
    Route::post('/update-cart-product', [ProductController::class, 'updateCartProductQuantity'])->name('update.cart.product');

   
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('dashboard');
});

require __DIR__ . '/auth.php';