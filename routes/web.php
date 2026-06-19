<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\TransaksiKasController;
use App\Http\Controllers\LimitBudgetController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/limitbudget', [LimitBudgetController::class, 'index'])
    ->name('limitbudget');

Route::post('/limitbudget/store', [LimitBudgetController::class, 'store'])
    ->name('limitbudget.store');

Route::post('/limitbudget/update/{id}', [LimitBudgetController::class, 'update'])
    ->name('limitbudget.update');

Route::get('/laporankeuangan', [KeuanganController::class, 'laporankeuangan'])
    ->name('laporankeuangan');

Route::get('/laporankeuangan/pdf', [KeuanganController::class, 'downloadPdf'])
    ->name('laporankeuangan.pdf');

Route::get('/pemasukan', [TransaksiKasController::class, 'pemasukan'])
    ->name('pemasukan');

Route::get('/pengeluaran', [TransaksiKasController::class, 'pengeluaran'])
    ->name('pengeluaran');

Route::get('/transaksi/create/{tipe}', [TransaksiKasController::class, 'create'])
    ->name('transaksi.create');

Route::post('/transaksi/store', [TransaksiKasController::class, 'store'])
    ->name('transaksi.store');

Route::get('/transaksi/edit/{id}', [TransaksiKasController::class, 'edit'])
    ->name('transaksi.edit');

Route::post('/transaksi/update/{id}', [TransaksiKasController::class, 'update'])
    ->name('transaksi.update');

Route::get('/transaksi/delete/{id}', [TransaksiKasController::class, 'delete'])
    ->name('transaksi.delete');

Route::get('/transaksi/template', [TransaksiKasController::class, 'downloadTemplate'])
    ->name('transaksi.template');

Route::post('/transaksi/import', [TransaksiKasController::class, 'importExcel'])
    ->name('transaksi.import');