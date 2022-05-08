<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([\App\Http\Middleware\admin::class])->group(function() {

    Route::resource('users', \App\Http\Controllers\backend\UserController::class);
    Route::get('/user/destroy/{id}', [\App\Http\Controllers\backend\UserController::class, 'destroy'])->name('deleteUser');
    Route::get('/user/search', [\App\Http\Controllers\backend\UserController::class, 'search'])->name('userSearch');
    Route::post('/change_password/{id}', [\App\Http\Controllers\backend\UserController::class, 'changePassword'])->name('changePassword');


//countries
    Route::resource('countries', \App\Http\Controllers\backend\CountryController::class);
    Route::get('/country/destroy/{id}', [\App\Http\Controllers\backend\CountryController::class, 'destroy'])->name('deleteCountry');
    Route::get('/country/search', [\App\Http\Controllers\backend\CountryController::class, 'search'])->name('countrySearch');

//states
    Route::resource('states', \App\Http\Controllers\backend\StateController::class);
    Route::get('/state/destroy/{id}', [\App\Http\Controllers\backend\StateController::class, 'destroy'])->name('deleteState');
    Route::get('/state/search', [\App\Http\Controllers\backend\StateController::class, 'search'])->name('stateSearch');

//cities
    Route::resource('cities', \App\Http\Controllers\backend\CityController::class);
    Route::get('/city/destroy/{id}', [\App\Http\Controllers\backend\CityController::class, 'destroy'])->name('deleteCity');
    Route::get('/city/search', [\App\Http\Controllers\backend\CityController::class, 'search'])->name('citySearch');

//departments
    Route::resource('departments', \App\Http\Controllers\backend\DepartmentController::class);
    Route::get('/department/destroy/{id}', [\App\Http\Controllers\backend\DepartmentController::class, 'destroy'])->name('deleteDepartment');
    Route::get('/department/search', [\App\Http\Controllers\backend\DepartmentController::class, 'search'])->name('departmentSearch');

//employees
    Route::resource('employees', \App\Http\Controllers\backend\EmployeeController::class);
    Route::get('/employee/destroy/{id}', [\App\Http\Controllers\backend\EmployeeController::class, 'destroy'])->name('deleteEmployee');
    Route::get('/employee/search', [\App\Http\Controllers\backend\EmployeeController::class, 'search'])->name('employeeSearch');
    Route::post('/get_states', [\App\Http\Controllers\backend\EmployeeController::class, 'getStates']);
    Route::post('/get_cities', [\App\Http\Controllers\backend\EmployeeController::class, 'getCities']);
});
