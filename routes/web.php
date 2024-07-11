<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;

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

// PROTECTED PAGE
Route::get('/', [HomeController::class, 'homedash'])->name('homedash')->middleware('auth');
Route::get('site-dashboard', [HomeController::class, 'home'])->name('home')->middleware('auth');

// USER
Route::get('user/lists', [UserController::class, 'viewListUsers'])->name('user.list')->middleware('auth');
Route::get('user/add-user', [UserController::class, 'addUser'])->name('user.add')->middleware('auth');
Route::post('user/register/action', [UserController::class, 'actionregister'])->name('actionregister')->middleware('auth');
Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::patch('user/inactive/{id}', [UserController::class, 'changeStatusUser'])->name('user.inactive')->middleware('auth');

// TRANSACTION
Route::get('transactions/lists', [TransactionController::class, 'allTransaction'])->name('transactions.all')->middleware('auth');
Route::get('transactions/add-invoice', [TransactionController::class, 'addTransaction'])->name('transactions.add')->middleware('auth');
Route::get('invoice/{invoice_number}', [TransactionController::class, 'viewInvoice'])->name('transactions.invoice')->middleware('auth');
Route::post('submitTransaction', [TransactionController::class, 'submitTransaction'])->name('submit.transaction')->middleware('auth');

// SELAIN //

// LOGIN
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [AuthController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// REGISTER
// Route::get('register', [AuthController::class, 'register'])->name('register');
// Route::post('register/action', [AuthController::class, 'actionregister'])->name('actionregister');