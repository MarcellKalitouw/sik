<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PengeluaranController,
    PencatatanKeuanganController,
    PemasukkanController,
    DashboardController,
    LaporanController,
    LoginController
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

Route::get('login', [LoginController::class, 'viewLogin'])->name('login');
Route::post('login-post', [LoginController::class, 'postLogin'])->name('post.login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('dashboard.index');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/laporan/{date?}', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/filter/{tipe}/{value}', [LaporanController::class, 'filter'])->name('laporan.filter');


    Route::resource('pencatatan-keuangan', PencatatanKeuanganController::class);
    Route::resource('data-pengeluaran', PengeluaranController::class);
    Route::resource('data-pemasukkan', PemasukkanController::class);
});

