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
Route::middleware(['auth', 'user-access:admin'])->prefix('/admin')->group(function(){
    Route::get('/',[HomeController::class, 'admin'])->name('admin.home');
    Route::get('/pegawai',[PegawaiController::class, 'show'])->name('pegawai');
    Route::get('/pegawai/create',[PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/add',[PegawaiController::class, 'store'])->name('pegawai.add');
    Route::get('/pegawai/edit/{id}',[PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/pegawai/update/{id}',[PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/delete/{id}',[PegawaiController::class, 'destroy'])->name('pegawai.delete');
    Route::get('/tamu',[TamuController::class, 'show'])->name('tamu');
    Route::put('/tamu/confirm/{id}',[TamuController::class, 'setConfirm'])->name('confirm');
    Route::put('/tamu/cancel/{id}',[TamuController::class, 'setCancel'])->name('cancel');
    Route::get('/tamu/{id}',[TamuController::class, 'showDetail'])->name('tamu.detail');
});

//User Routes
Route::middleware(['auth', 'user-access:user'])->prefix('/users')->group(function(){
    Route::get('/',[HomeController::class, 'index'])->name('user.home');
    Route::get('/tamu',[TamuController::class, 'show'])->name('tamu.show');
    Route::get('/tamu/create',[TamuController::class, 'create'])->name('tamu.create');
    Route::post('/tamu/add',[TamuController::class, 'store'])->name('tamu.add');
    Route::get('/tamu/edit/{id}',[TamuController::class, 'edit'])->name('tamu.edit');
    Route::post('/tamu/update/{id}',[TamuController::class, 'update'])->name('tamu.update');
    Route::put('/tamu/confirm/{id}',[TamuController::class, 'setConfirm'])->name('tamu.confirm');
    Route::put('/tamu/cancel/{id}',[TamuController::class, 'setCancel'])->name('tamu.cancel');
    Route::get('/tamu/{id}',[TamuController::class, 'showDetail'])->name('tamu.show-detail');
});


