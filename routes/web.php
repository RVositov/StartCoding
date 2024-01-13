<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassroomController;




use App\Http\Controllers\CourseController;
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

    Route::resource('teachers', TeacherController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('students', StudentController::class);

    Route::get('/schools/{city_id}', [SchoolController::class, 'getSchoolsByCity'])->name('schools.by_city');

    Route::resource('courses', CourseController::class);

});

Route::get('/groups/{group}/edit', 'GroupController@edit')->name('groups.edit');
Route::resource('groups', 'GroupController');
Route::resource('groups', GroupController::class);
Route::resource('schools', SchoolController::class);
Route::put('/schools/{id}', 'SchoolController@update')->name('schools.update');
Route::delete('/schools/{id}', 'SchoolController@destroy')->name('schools.destroy');
Route::resource('classrooms', ClassroomController::class);


