<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ActivityLogController,
    AduanController,
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController,
    BackupController,
    SettingAppController
};

Route::get('/', function () {
    return redirect()->route('login');
});
// Route::get('/', [LandingWebController::class, 'index'])->name('web');

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
        Route::resource('wargas', App\Http\Controllers\WargaController::class)->middleware('auth');
        Route::resource('aduan-wargas', App\Http\Controllers\AduanWargaController::class)->middleware('auth');
        Route::resource('kegiatan-wargas', App\Http\Controllers\KegiatanWargaController::class)->middleware('auth');
    });
});

