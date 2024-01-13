<?php

use App\Models\Car;
use App\Models\Debt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CompanyExpenseController;

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

//company_expense
Route::get('company_expense', [CompanyExpenseController::class, 'company_expense']);
Route::post('company_expense_stores', [CompanyExpenseController::class, 'company_expense_stores']);
Route::get('company_expense_update/{id}', [CompanyExpenseController::class, 'company_expense_update']);
Route::post('company_expense_edit/{id}', [CompanyExpenseController::class, 'company_expense_edit']);

Route::get('expense_delete/{id}', [CompanyExpenseController::class, 'expense_delete']);




// customer
Route::get('customer', [CustomerController::class, 'customer']);

Route::get('logout', [AuthController::class, 'logout']);

//Items
Route::get('product', [ItemController::class, 'item']);
Route::post('product_store', [ItemController::class, 'item_store']);
Route::get('product_delete/{id}', [ItemController::class, 'product_delete']);
Route::get('product_update/{id}', [ItemController::class, 'product_update']);
Route::post('update/{id}', [ItemController::class, 'update_product']);



//Customer
Route::get('customer', [CustomerController::class, 'customer']);
Route::post('customer_store', [CustomerController::class, 'customer_store']);
Route::get('customer_delete/{id}', [CustomerController::class, 'customer_delete']);
Route::get('customer_edit/{id}', [CustomerController::class, 'customer_edit']);
Route::post('customer_update/{id}', [CustomerController::class, 'customer_update']);

//Invoice
Route::post('/autocomplete-item-code', [InvoiceController::class, 'autocompleteItemCode'])->name('autocomplete.item-code');
Route::post('/get-item-data', [InvoiceController::class, 'getItemData'])->name('get.item.data');
Route::post('/autocomplete_price', [App\Http\Controllers\InvoiceController::class, 'autocomplete_price'])->name('autocomplete_price');
Route::get('/customer_service_search', [App\Http\Controllers\InvoiceController::class, 'customer_service_search'])->name('customer_service_search');
Route::post('/customer_service_search_fill', [App\Http\Controllers\InvoiceController::class, 'customer_service_search_fill'])->name('customer_service_search_fill');
Route::get('/customer_service_details/{id}', [InvoiceController::class, 'details']);
Route::post('/get-item-data', [InvoiceController::class, 'getItemData'])->name('get.item.data');


Route::get('invoice/{id}', [InvoiceController::class, 'invoice']);
Route::post('/store_invoice/{id}', [InvoiceController::class, 'store_invoice']);
Route::get('/invoiceManage', [InvoiceController::class, 'invoiceManage']);
Route::get('/invoiceManage/{id}', [InvoiceController::class, 'invoiceDetail']);

//Payment
Route::get('/payment/{id}', [PaymentController::class, 'payment'])->name('payment.show');;
Route::post('/payment_register', [PaymentController::class, 'payment_register']);
Route::get('payment_delete/{id}', [PaymentController::class, 'payment_delete']);
Route::get('payment_edit/{id}', [PaymentController::class, 'payment_edit']);
Route::post('payment_update/{id}', [PaymentController::class, 'payment_update']);
