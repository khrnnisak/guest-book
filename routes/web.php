<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

//Admin Routes
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function(){
    Route::get('/',[HomeController::class, 'admin'])->name('admin.home');
    Route::controller(PegawaiController::class)->prefix('/pegawai')->group(function(){
        Route::get('/', 'show')->name('pegawai');
        Route::get('/create','create')->name('pegawai.create');
        Route::get('/edit/{id}','edit')->name('pegawai.edit');
        Route::post('/add','store')->name('pegawai.add');
        Route::post('/update/{id}','update')->name('pegawai.update');
        Route::delete('/delete/{id}','destroy')->name('pegawai.delete');
    });
    Route::controller(TamuController::class)->prefix('/tamu')->group(function(){
        Route::get('/','show')->name('tamu');
        Route::put('/confirm/{id}','setConfirm')->name('confirm');
        Route::put('/cancel/{id}','setCancel')->name('cancel');
        Route::get('/show/{id}','showDetail')->name('tamu.detail');
    });
});

//User Routes
Route::middleware(['auth', 'user-access:user'])->prefix('users')->group(function(){
    Route::get('/',[HomeController::class, 'index'])->name('user.home');
    Route::controller(TamuController::class)->prefix('/tamu')->group(function(){
        Route::get('/','show')->name('tamu.show');
        Route::get('/create','create')->name('tamu.create');
        Route::post('/add','store')->name('tamu.add');
        Route::get('/edit/{id}','edit')->name('tamu.edit');
        Route::post('/update/{id}','update')->name('tamu.update');
        Route::put('/confirm/{id}','setConfirm')->name('tamu.confirm');
        Route::put('/cancel/{id}','setCancel')->name('tamu.cancel');
        Route::get('/show/{id}','showDetail')->name('tamu.show-detail');
    });
   
});


