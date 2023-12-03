<?php

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

Route::post('/logout', Logout::class)->name('logout');
Route::get('/logout', Logout::class)->name('logout');


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



Route::get('/', Home::class)->name('home.index');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/product-category/{slug}', CategoryShop::class)->name('product.category');
Route::get('/product-details/{slug}', ProductDetails::class)->name('product.details');

Route::get('/cart', CartShop::class)->name('shop.cart');
Route::get('/chekout', Chekout::class)->name('sshop.chekout');

Route::middleware(['auth'])->group(function(){

    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
Route::middleware(['auth', 'authadmin'])->group(function(){

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/category', AdminCategory::class)->name('admin.category');
    Route::get('/admin/categories/add', AdminAddCategory::class)->name('admin.categories.add');


});
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';






