<?php

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

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ExternalLinkController;
use App\Http\Controllers\Admin\EkkScoreController;
use App\Http\Controllers\Admin\KerjaSamaController;
use App\Http\Controllers\Admin\DokumentasiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\LppdController;

Route::get('/', [PublicController::class, 'beranda'])->name('public.beranda');
Route::get('/profil', [PublicController::class, 'profil'])->name('public.profil');
Route::get('/sub-bagian/otda', [PublicController::class, 'otda'])->name('public.otda');
Route::get('/sub-bagian/pemerintahan', [PublicController::class, 'pemerintahan'])->name('public.pemerintahan');
Route::get('/sub-bagian/kewilayahan', [PublicController::class, 'kewilayahan'])->name('public.kewilayahan');
Route::get('/dokumentasi', [PublicController::class, 'dokumentasi'])->name('public.dokumentasi');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/settings/hero', [SettingController::class, 'updateHero'])->name('settings.hero');
    Route::post('/settings/visimisi', [SettingController::class, 'updateVisiMisi'])->name('settings.visimisi');
    Route::resource('settings', SettingController::class);
    
    // Profil Routes
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/stats', [ProfilController::class, 'updateStats'])->name('profil.stats');
    Route::post('/profil/struktur', [ProfilController::class, 'updateStruktur'])->name('profil.struktur');
    Route::post('/profil/pejabat', [ProfilController::class, 'storePejabat'])->name('profil.pejabat.store');
    Route::put('/profil/pejabat/{pejabat}', [ProfilController::class, 'updatePejabat'])->name('profil.pejabat.update');
    Route::delete('/profil/pejabat/{pejabat}', [ProfilController::class, 'destroyPejabat'])->name('profil.pejabat.destroy');
    
    // LPPD Routes
    Route::get('/lppd', [LppdController::class, 'index'])->name('lppd.index');
    Route::post('/lppd', [LppdController::class, 'store'])->name('lppd.store');
    Route::put('/lppd/{laporan}/status', [LppdController::class, 'updateStatus'])->name('lppd.status');
    Route::delete('/lppd/{laporan}', [LppdController::class, 'destroy'])->name('lppd.destroy');
    Route::resource('external-links', ExternalLinkController::class);
    Route::resource('ekk-scores', EkkScoreController::class);
    Route::resource('kerja-samas', KerjaSamaController::class);
    Route::resource('dokumentasis', DokumentasiController::class);
});

require __DIR__.'/auth.php';

