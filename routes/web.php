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
  return redirect('auth/login');
});
Route::get('/home', function () {
    return view('index');
});
Route::prefix('dashboard')->group(function () {
    Route::get('/dashboard2', function () {
        return view('dashboard-2.index');
    });
    Route::get('/dashboard3', function () {
        return view('dashboard-3.index');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('front-pages.login.index');
    });
    Route::get('/register', function () {
        return view('front-pages.register.index');
    });
    Route::get('/forgot-password', function () {
        return view('front-pages.password-reminder.index');
    });
});
Route::prefix('tables')->group(function () {
    Route::get('/static', function () {
        return view('tables.static-tables.index');
    });
    Route::get('/Gridjs', function () {
        return view('tables.gridjs.index');
    });
    Route::get('/Tabulator', function () {
        return view('tables.tabulator.index');
    });
});
