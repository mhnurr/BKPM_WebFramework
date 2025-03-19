<?php
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/acara17', function () {
    return view('welcome');
});

Route::get('/session/create', [SessionController::class, 'create']);

Route::get('/session/show', [SessionController::class, 'show']);

Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/huda', [PegawaiController::class, 'index']);

Route::get('/pegawai/formulir', [PegawaiController::class, 'formulir']);

Route::post('/formulir/proses',  [PegawaiController::class, 'proses']);

Route::get('/cobaerror', [PegawaiController::class, 'cobaerror']);
