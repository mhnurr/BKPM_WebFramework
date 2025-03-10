<?php
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureUserIsAuthenticated; // Pastikan middleware diimport

Auth::routes();

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        return "Ini adalah halaman profil!";
    });

    Route::get('/dashboard', function () {
        return "Ini adalah halaman dashboard!";
    });
});