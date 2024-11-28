<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AduanWargaController,
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController,
    BackupController,
    KegiatanWargaController,
    SettingAppController,
    WargaController
};

Route::get('/', function () {
    return redirect()->route('login');
});
Route::prefix('panel')->group(function () {
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', ProfileController::class)->name('profile');
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleAndPermissionController::class);
        Route::get('/dashboard', function () {
            return redirect()->route('dashboard');
        });
        Route::resource('setting-apps', SettingAppController::class);
        Route::get('/backup', [BackupController::class, 'index'])->name('backup.index');
        Route::get('/backup/download', [BackupController::class, 'downloadBackup'])->name('backup.download');
        Route::resource('wargas', WargaController::class)->middleware('auth');
        Route::resource('aduan-wargas', AduanWargaController::class)->middleware('auth');
        Route::resource('kegiatan-wargas', KegiatanWargaController::class)->middleware('auth');
        Route::put('wargas/{id}/verifikasi', [WargaController::class, 'verifikasi'])->name('wargas.verifikasi');

    });
});

