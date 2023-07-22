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
Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/admin',[HomeController::class, 'admin'])->name('admin.home');
    Route::get('/admin/pegawai',[PegawaiController::class, 'show'])->name('pegawai');
    Route::get('/admin/pegawai/create',[PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/admin/pegawai/add',[PegawaiController::class, 'store'])->name('pegawai.add');
    Route::get('/admin/pegawai/edit/{id}',[PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/admin/pegawai/update/{id}',[PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/admin/pegawai/delete/{id}',[PegawaiController::class, 'destroy'])->name('pegawai.delete');
    Route::get('/admin/tamu',[TamuController::class, 'show'])->name('tamu');
    Route::put('/admin/tamu/confirm/{id}',[TamuController::class, 'setConfirm'])->name('confirm');
    Route::put('/admin/tamu/cancel/{id}',[TamuController::class, 'setCancel'])->name('cancel');
    Route::get('/admin/tamu/{id}',[TamuController::class, 'showDetail'])->name('tamu.detail');
});

//User Routes
Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/users',[HomeController::class, 'index'])->name('user.home');
    Route::get('/users/tamu',[TamuController::class, 'show'])->name('tamu.show');
    Route::get('/users/tamu/create',[TamuController::class, 'create'])->name('tamu.create');
    Route::post('/users/tamu/add',[TamuController::class, 'store'])->name('tamu.add');
    Route::get('/users/tamu/edit/{id}',[TamuController::class, 'edit'])->name('tamu.edit');
    Route::post('/users/tamu/update/{id}',[TamuController::class, 'update'])->name('tamu.update');
    Route::put('/users/tamu/confirm/{id}',[TamuController::class, 'setConfirm'])->name('tamu.confirm');
    Route::put('/users/tamu/cancel/{id}',[TamuController::class, 'setCancel'])->name('tamu.cancel');
    Route::get('/users/tamu/{id}',[TamuController::class, 'showDetail'])->name('tamu.show-detail');
});


