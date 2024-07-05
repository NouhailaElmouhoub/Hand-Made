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




use App\Http\Controllers\StripeController;

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');

use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;

Route::delete('/cart/remove/{id}/{type}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

use App\Http\Controllers\OrderController;

Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.delete');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
});


Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');

// routes/web.php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// routes/web.php
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');


Route::get('/promos', 'App\Http\Controllers\PromoController@index')->name("promo.index");
Route::get('/promos/{id}', 'App\Http\Controllers\PromoController@show')->name("promo.show");



Route::get('/assietes', 'App\Http\Controllers\AssietesController@index')->name("assiete.index");
Route::get('/assietes/{id}', 'App\Http\Controllers\AssietesController@show')->name("assiete.show");

Route::get('/Bols', 'App\Http\Controllers\BolsController@index')->name("bol.index");
Route::get('/Bols/{id}', 'App\Http\Controllers\BolsController@show')->name("bol.show");

Route::get('/plats', 'App\Http\Controllers\PlatsController@index')->name("plat.index");
Route::get('/plats/{id}', 'App\Http\Controllers\PlatsController@show')->name("plat.show");


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");




    Route::get('/admin/promos', 'App\Http\Controllers\Admin\AdminPromoController@index')->name("admin.promo.index");
    Route::post('/admin/promos/store', 'App\Http\Controllers\Admin\AdminPromoController@store')->name("admin.promo.store");
    Route::delete('/admin/promos/{id}/delete', 'App\Http\Controllers\Admin\AdminPromoController@delete')->name("admin.promo.delete");
    Route::get('/admin/promos/{id}/edit', 'App\Http\Controllers\Admin\AdminPromoController@edit')->name("admin.promo.edit");
    Route::put('/admin/promos/{id}/update', 'App\Http\Controllers\Admin\AdminPromoController@update')->name("admin.promo.update");




    Route::get('/admin/assietes', 'App\Http\Controllers\Admin\AdminAssietesController@index')->name("admin.assiete.index");
    Route::post('/admin/assietes/store', 'App\Http\Controllers\Admin\AdminAssietesController@store')->name("admin.assiete.store");
    Route::delete('/admin/assietes/{id}/delete', 'App\Http\Controllers\Admin\AdminAssietesController@delete')->name("admin.assiete.delete");
    Route::get('/admin/assietes/{id}/edit', 'App\Http\Controllers\Admin\AdminAssietesController@edit')->name("admin.assiete.edit");
    Route::put('/admin/assietes/{id}/update', 'App\Http\Controllers\Admin\AdminAssietesController@update')->name("admin.assiete.update");




    Route::get('/admin/Bols', 'App\Http\Controllers\Admin\AdminBolsController@index')->name("admin.bol.index");
    Route::post('/admin/Bols/store', 'App\Http\Controllers\Admin\AdminBolsController@store')->name("admin.bol.store");
    Route::delete('/admin/Bols/{id}/delete', 'App\Http\Controllers\Admin\AdminBolsController@delete')->name("admin.bol.delete");
    Route::get('/admin/Bols/{id}/edit', 'App\Http\Controllers\Admin\AdminBolsController@edit')->name("admin.bol.edit");
    Route::put('/admin/Bols/{id}/update', 'App\Http\Controllers\Admin\AdminBolsController@update')->name("admin.bol.update");




    Route::get('/admin/Plats', 'App\Http\Controllers\Admin\AdminPlatsController@index')->name("admin.plat.index");
    Route::post('/admin/Plats/store', 'App\Http\Controllers\Admin\AdminPlatsController@store')->name("admin.plat.store");
    Route::delete('/admin/Plats/{id}/delete', 'App\Http\Controllers\Admin\AdminPlatsController@delete')->name("admin.plat.delete");
    Route::get('/admin/Plats/{id}/edit', 'App\Http\Controllers\Admin\AdminPlatsController@edit')->name("admin.plat.edit");
    Route::put('/admin/Plats/{id}/update', 'App\Http\Controllers\Admin\AdminPlatsController@update')->name("admin.plat.update");
});

Auth::routes();
