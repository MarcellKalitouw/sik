<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PengeluaranController,
    PencatatanKeuanganController,
    PemasukkanController,
    DashboardController,
    LaporanController
};


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
    return view('dashboard.index');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/laporan/{date?}', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/filter/{tipe}/{value}', [LaporanController::class, 'filter'])->name('laporan.filter');


Route::resource('pencatatan-keuangan', PencatatanKeuanganController::class);
Route::resource('data-pengeluaran', PengeluaranController::class);
Route::resource('data-pemasukkan', PemasukkanController::class);
