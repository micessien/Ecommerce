<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ImpersonateController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail/{detail}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);
Route::post('/add_to_cart', [ProductController::class, 'addToCart'])->middleware('auth');
Route::get('/cartlist', [ProductController::class, 'cartList'])->middleware('auth');
Route::get('/removecart/{id}', [ProductController::class, 'removeCart'])->middleware('auth');
Route::get('/ordernow', [ProductController::class, 'orderNow'])->middleware('auth');
Route::post('/orderplace', [ProductController::class, 'orderPlace'])->middleware('auth');
Route::get('/myorders', [ProductController::class, 'myOrders'])->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('users', 'UserController', ['except' => ['show']]);
    Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
});

Route::get('/admin/impersonate/destroy', 'Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');

// Management Users
Route::namespace('Admin')->group(function(){
    Route::get('user/register', 'RegisterUserController@registrationForm')->name('user.register')->middleware('auth');
    Route::post('user/register', 'RegisterUserController@registerUser')->name('user.register.store')->middleware('auth');
});
