<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Backend\PengalamanKerjaController;

Route::resource('/dashboard', DashboardController::class);

Route::prefix('backend')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);

});
