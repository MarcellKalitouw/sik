<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PengeluaranController,
    PencatatanKeuanganController,
    PemasukkanController,
    DashboardController,
    LaporanController,
    LoginController,
    KategoriController,
    UserController
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

route::get('/page_user/{bln?}/{thn?}', [DashboardController::class,'pageUser'])->name('page.user');

Route::get('test', [LoginController::class, 'view'])->name('test.view');
Route::post('testposts/{post}/post', [LoginController::class, 'postTest'])->name('post.test');

Route::get('/', function () {
    return redirect()->route('page.user');;
});
Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/{bln?}/{thn?}', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/laporan/{tipe?}/{value?}', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/filter/{tipe}/{value}', [LaporanController::class, 'filterDownload'])->name('laporan.filter');


    Route::resource('pencatatan-keuangan', PencatatanKeuanganController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('data-pengeluaran', PengeluaranController::class);
    Route::resource('data-pemasukkan', PemasukkanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('user', UserController::class);
});

