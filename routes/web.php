<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'home'])->name('home');

Route::get('/admin', [PostController::class, 'index'])->name('admin');

Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [PostController::class, 'store'])->name('admin.store');

Route::get('/admin/edit/{post}', [PostController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{post}', [PostController::class, 'update'])->name('admin.update');

Route::get('/admin/destroy/{post}', [PostController::class, 'destroy'])->name('admin.destroy');
