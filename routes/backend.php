<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\EmailController;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Controllers\Account\PasswordController;
use App\Http\Controllers\Settings\BackupController;
use App\Http\Controllers\Settings\MenuBuilderController;
use App\Http\Controllers\Settings\MenuController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\SettingController;
use Illuminate\Support\Facades\Route;


// Menus
Route::resource('menus', MenuController::class)->except('show');
Route::group(['as' => 'menus.', 'prefix' => 'menus/{menu}'], function () {
    Route::resource('builder', MenuBuilderController::class);
    Route::post('builder/move', [MenuBuilderController::class, 'move'])->name('builder.move');
});

// Accounts
Route::group(['as' => 'account.', 'prefix' => 'account'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::get('/email', [EmailController::class, 'index'])->name('email.index');
    Route::post('/email', [EmailController::class, 'store'])->name('email.store');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Settings
Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('backups', BackupController::class)->only('index', 'store', 'destroy');
    Route::get('backups/download/{file_name}', [BackupController::class, 'download'])->name('backups.download');
});
