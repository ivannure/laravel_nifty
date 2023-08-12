<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DatadiriController;
use App\Http\Controllers\JenisProductController;

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
    Route::post('/data', [DatadiriController::class, 'data']);
    Route::get('/simpan/{id}', [DatadiriController::class, 'simpan']);
    Route::post('/hapus/{id}', [DatadiriController::class, 'destroy']);
    Route::post('/update/{id}', [DatadiriController::class, 'update']);
    // Route::put('/update/{id}', [DatadiriController::class, 'update'])->name('datadiri.update');

});

Route::prefix('data-master')->group(function () {
    Route::prefix('/jenis-product')->group(function () {
        Route::get('/', [JenisProductController::class, 'index']);
        Route::post('/data', [JenisProductController::class, 'data']);
        // Route::get('/simpan/{id}', [DatadiriController::class, 'simpan']);
        Route::post('/hapus/{id}', [JenisProductController::class, 'destroy']);
        Route::post('/update/{id}', [JenisProductController::class, 'update']);
    });
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/data', [ProductController::class, 'data']);
        Route::post('/tambah', [ProductController::class, 'tambah']);
        // Route::get('/simpan/{id}', [DatadiriController::class, 'simpan']);
        Route::post('/hapus/{id}', [ProductController::class, 'destroy']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
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

// Middleware

