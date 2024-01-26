<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseTypeController;


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

    Route::get('/' , function (){
        return view('main.index');
    })->name('dashboard');

    Route::get('/getSchoolsByCity/{city_id}', [SchoolController::class, 'getSchoolsByCity'])->name('schools.by_city');

    Route::resource('teachers', TeacherController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('timetables', TimeTableController::class);
    Route::resource('schools', SchoolController::class);;
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('journals', JournalController::class);
    Route::post('/journal/store',[JournalController::class,'store'])->name('journal.store');
    Route::get('/journal/{groupId}/{month?}/{year?}',[JournalController::class,'edit'])->name('journal.edit');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('expenses', ExpenseController::class);
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

    Route::get('/expense_types', [ExpenseTypeController::class, 'index'])->name('expense_types.index');
    Route::get('/expense_types/create', [ExpenseTypeController::class, 'create'])->name('expense_types.create');
    Route::post('/expense_types', [ExpenseTypeController::class, 'store'])->name('expense_types.store');
    Route::get('/expense_types/{expenseType}/edit', [ExpenseTypeController::class, 'edit'])->name('expense_types.edit');
    Route::put('/expense_types/{expenseType}', [ExpenseTypeController::class, 'update'])->name('expense_types.update');
    Route::delete('/expense_types/{expenseType}', [ExpenseTypeController::class, 'destroy'])->name('expense_types.destroy');

    Route::resource('incomes',IncomeController::class);
    Route::get('/incomes/student/{id}', [IncomeController::class, 'showStudent'])->name('incomes.showStudent');

});
