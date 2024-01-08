<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ExpenseController;


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

Route::get('/log' , function (){
    return view('user.login');
});
Route::get('/login' , function (){
    return view('user.login');
});

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['auth.redirect'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::get('/register' , function (){
        return view('user.register');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/invoice', function () {
        return view('invoice.invoice');
    })->name('invoice');

    Route::get('/client-code', function () {
        return view('ClientCodes.index');
    });

    // clients
    Route::get('/admin/client', [ClientController::class, 'index'])->name('client');
    Route::get('/admin/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::get('/admin/client/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/admin/client/update/{client}', [ClientController::class, 'update'])->name('admin.client.update');
    Route::post('/admin/client/store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::get('/admin/client/destroy/{client}', [ClientController::class, 'destroy'])->name('admin.client.destroy');
    // unpaid clients
    Route::get('/unpaid-clients', [ClientController::class, 'unpaid'])->name('unpaid-clients');

    // invoice routes
    Route::get('/admin/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/admin/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/admin/invoice/edit/{client}', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('/admin/invoice/update/{client}', [InvoiceController::class, 'update'])->name('admin.invoice.update');
    Route::post('/admin/invoice/store', [InvoiceController::class, 'store'])->name('admin.invoice.store');
    Route::get('/admin/invoice/destroy/{client}', [InvoiceController::class, 'destroy'])->name('admin.invoice.destroy');

    Route::get('/admin/client-invoice', [InvoiceController::class, 'clientInvoices'])->name('invoice.client');

    // invoiceDetails routes

    Route::get('/admin/invoice-details/create/{id}', [InvoiceDetailsController::class, 'create'])->name('invoice-details.create');
    Route::get('/admin/invoice-details/edit/{id}', [InvoiceDetailsController::class, 'edit'])->name('invoice-details.edit');
    Route::post('/admin/invoice-details/store', [InvoiceDetailsController::class, 'store'])->name('invoice-details.store');
    Route::get('/admin/invoice-details/report/{id}', [InvoiceDetailsController::class, 'report'])->name('invoice-details.report');

    // Ajax Get -client codes
    Route::get('/get-codes/{clientId}',[ClientController::class,'getCodes'])->name("get-codes");

    //CashRegister
    Route::get('/cash/income',[CashRegisterController::class,'income'])->name('cash.income');
    Route::post('/cash/store',[CashRegisterController::class,'store'])->name('cash.store');
    Route::get('cash/income-list',[CashRegisterController::class, 'index'])->name('cash.income-list');
    //Expense
    Route::get('/expense/create',[ExpenseController::class,'create'])->name('expense.create');
    Route::post('/expense/store',[ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/list',[ExpenseController::class,'list'])->name('expense.list');
    Route::get('/expense/index',[ExpenseController::class,'index'])->name('expense.index');


    //Cargo
    Route::get('/cargo',[CargoController::class,'index'])->name('cargo.index');
    Route::get('/cargo/create',[CargoController::class,'create'])->name('cargo.create');
    Route::post('/cargo/store',[CargoController::class,'store'])->name('cargo.store');
    Route::get('/cargo/destroy/{cargo}', [CargoController::class, 'destroy'])->name('cargo.destroy');
    Route::get('/cargo/edit/{cargo}', [CargoController::class, 'edit'])->name('cargo.edit');
    Route::post('/cargo/update/{cargo}', [CargoController::class, 'update'])->name('cargo.update');
    Route::get('/cargo/report/{cargo}', [CargoController::class, 'report'])->name('cargo.report');

    // code
    Route::get('/code/create',[CodeController::class,'create'])->name('code.create');
    Route::post('/code/store',[CodeController::class,'store'])->name('code.store');
    Route::get('/code',[CodeController::class,'index'])->name('code.index');

});


