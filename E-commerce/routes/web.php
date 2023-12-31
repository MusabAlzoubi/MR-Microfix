<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\shop;
use App\Livewire\Home;
use App\Livewire\CartShop;
use App\Livewire\Chekout;
use App\Livewire\ProductDetails;
use App\Livewire\CategoryShop;

use App\Livewire\User\UserDashboard;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminCategory;
use App\Livewire\Admin\AdminAddCategory;


use App\Livewire\Actions\Logout;
use App\Livewire\Search;
use App\Livewire\Wishlist;

// routes/web.php


// Route::post('/logout', [AuthLogoutController::class, 'logout'])->name('logout');



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
// routes/web.php or routes/web.php


Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



Route::get('/', Home::class)->name('home.index');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/product-category/{slug}', CategoryShop::class)->name('product.category');
Route::get('/product-details/{slug}', ProductDetails::class)->name('product.details');

Route::get('/cart', CartShop::class)->name('shop.cart');
Route::get('/wishlist', Wishlist::class)->name('product.wishlist');

Route::get('/chekout', Chekout::class)->name('shop.chekout');
Route::get('/search', Search::class)->name('product.search');


Route::middleware(['auth'])->group(function(){

    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
Route::middleware(['auth', 'authadmin'])->group(function(){




});
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



// routes/web.php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
// routes/web.php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\USRProfile;

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('dashboard', DashboardController::class);
// Route::get('dashboard', [DashboardController::class, 'index'])->name('adm.dashboard');





Route::resource('myprofile', USRProfile::class);
