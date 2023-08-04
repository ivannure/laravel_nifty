<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatadiriController;

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
   
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', function () {
        return view('front-pages.register.index');
    });
    Route::get('/forgot-password', function () {
        return view('front-pages.password-reminder.index');
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('data-diri')->group(function () {
   
    Route::get('/', [DatadiriController::class, 'index']);
    Route::post('/store', [DatadiriController::class, 'store']);

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
