<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserAuthController;


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
Route::get('/', [UserAuthController::class, 'index']);
Route::get('login', [UserAuthController::class, 'index'])->name('login');
Route::post('user-login', [UserAuthController::class, 'userLogin'])->name('login.user'); 

Route::get('user-loginn', function () {
    return view('links_views');
})->name('home');
//Route::get('/',[CompanyController::class, 'index']);
Route::resource('companies', CompanyController::class);
//Route::get('/',[CompanyController::class, 'create'])->name('create');

//Route::get('/',[EmployeeController::class, 'index']);

Route::resource('employees', EmployeeController::class);