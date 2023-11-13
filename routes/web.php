<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function() {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/payroll', function() {
    return view('pages.menu.payroll');
})->name('payroll');

Route::get('/reports', function() {
    return view('pages.menu.reports');
})->name('reports');

Route::get('/calendar', function() {
    return view('pages.menu.calendar');
})->name('calendar');

Route::get('/employees', function() {
    return view('pages.menu.employees');
})->name('employees');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
