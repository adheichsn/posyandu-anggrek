<?php

use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PeralatanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PelayananController;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    // Menghitung tanggal awal dan akhir bulan ini
    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    // Menghitung tanggal awal dan akhir bulan sebelumnya
    $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
    $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

    // Menghitung tanggal awal dan akhir bulan setelahnya
    $startOfNextMonth = Carbon::now()->addMonth()->startOfMonth();
    $endOfNextMonth = Carbon::now()->addMonth()->endOfMonth();
    $jadwal = Jadwal::whereBetween('tanggal', [$startOfMonth, $endOfMonth])
        ->orWhereBetween('tanggal', [$startOfLastMonth, $endOfLastMonth])
        ->orWhereBetween('tanggal', [$startOfNextMonth, $endOfNextMonth])
        ->get();

    return redirect()->route('admin.login');
})->name('compro');
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('login-admin', [LoginController::class, 'showLoginFormAdmin'])->name('admin.login');
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

        // User
        Route::resource('user', UserController::class);
        Route::get('report/user', [UserController::class, 'export_pdf'])->name('user.report');

        // Anggota
        Route::resource('anggota', AnggotaController::class);
        Route::get('report/anggota', [AnggotaController::class, 'export_pdf'])->name('anggota.report');

        // Jadwal
        Route::resource('jadwal', JadwalController::class);
        Route::get('report/jadwal', [JadwalController::class, 'export_pdf'])->name('jadwal.report');
        Route::post('add/jenis-pelayanan', [JadwalController::class, 'add_jenis_pelayanan'])->name('jadwal.add_jenis_pelayanan');

        // Pelayanan
        Route::resource('pelayanan', PelayananController::class);
        Route::get('report/pelayanan', [PelayananController::class, 'export_pdf'])->name('pelayanan.report');
        Route::post('add/jenis-imunisasi', [PelayananController::class, 'add_jenis_imunisasi'])->name('pelayanan.add_jenis_imunisasi');
        Route::post('add/jenis-vitamin', [PelayananController::class, 'add_jenis_vitamin'])->name('pelayanan.add_jenis_vitamin');
        Route::post('edit/jenis-imunisasi/{id}', [PelayananController::class, 'edit_jenis_imunisasi'])->name('pelayanan.edit_jenis_imunisasi');
        Route::post('edit/jenis-vitamin/{id}', [PelayananController::class, 'edit_jenis_vitamin'])->name('pelayanan.edit_jenis_vitamin');
        Route::post('delete/jenis-imunisasi/{id}', [PelayananController::class, 'delete_jenis_imunisasi'])->name('pelayanan.delete_jenis_imunisasi');
        Route::post('delete/jenis-vitamin/{id}', [PelayananController::class, 'delete_jenis_vitamin'])->name('pelayanan.delete_jenis_vitamin');

        // Keuangan
        Route::resource('/keuangan', KeuanganController::class);
        Route::get('/keuangan-report/', [KeuanganController::class, 'report'])->name('keuangan.report');
    }
);
