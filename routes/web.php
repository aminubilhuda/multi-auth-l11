<?php

use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Grup route dengan prefix 'account' - semua route di dalam grup ini akan dimulai dengan /account
Route::group(["prefix"=> "account"], function () {
    
    Route::middleware(["middleware"=>"auth"])->group(function () {
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class,'index'])->name('account.dashboard');
    });
    
    Route::middleware(["middleware" => "guest"])->group(function () {
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('proses-register', [LoginController::class,'prosesRegister'])->name('account.prosesRegister');
        Route::post('auth', [LoginController::class,'auth'])->name('account.auth');
    });

});



Route::get('admin/login', [AdminLoginController::class,'index'])->name('admin.login');
Route::post('admin/auth', [AdminLoginController::class,'auth'])->name('admin.auth');
Route::get('admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
Route::get('admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');