<?php

use App\Models\Car;
use App\Models\Debt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\CustomerController;


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

Route::get('/', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'adminLogin'])->name('admin. login')->middleware('guest');
// Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/dashboard', function () {
    $debts = Debt::latest()->get();
    return view('dashboard', compact('debts'));
})->name('dashboard')->middleware(['auth', 'verified']);
Route::post('debt_register', [DebtController::class, 'store']);
Route::get('debt_delete/{id}', [DebtController::class, 'delete']);
Route::get('debt_edit/{id}', [DebtController::class, 'show']);
Route::put('debt_update/{id}', [DebtController::class, 'update']);





//user
Route::get('user', [UserController::class, 'user_register']);
Route::post('User_Register', [UserController::class, 'user_store']);
Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
Route::get('/userShow/{id}', [UserController::class, 'userShow']);


//profit
Route::get('profit', [ProfitController::class, 'profit']);
Route::post('profit_register ', [ProfitController::class, 'profit_register']);
Route::get('profit_delete/{id} ', [ProfitController::class, 'profit_delete']);
Route::get('profit_update/{id} ', [ProfitController::class, 'profit_update']);
Route::post('profit_edit/{id} ', [ProfitController::class, 'profit_edit']);






// customer
Route::get('customer', [CustomerController::class, 'customer']);