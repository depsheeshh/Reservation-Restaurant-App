<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return redirect()->to('/login');
});

Route::get('/login', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout']);

Route::resource('table', App\Http\Controllers\TableController::class);  
Route::resource('payment', App\Http\Controllers\PaymentController::class);  
Route::resource('reservation', App\Http\Controllers\ReservationController::class);  
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('order', App\Http\Controllers\OrderController::class);  
Route::resource('order_item', App\Http\Controllers\OrderItemController::class);  
Route::resource('menu', App\Http\Controllers\MenuController::class);
Route::resource('review', App\Http\Controllers\ReviewController::class);
Route::resource('employee', App\Http\Controllers\EmployeeController::class);
