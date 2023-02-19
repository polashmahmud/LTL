<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\EmailController;
use App\Http\Controllers\Account\NotificationController;
use App\Http\Controllers\Account\PasswordController;
use App\Http\Controllers\Settings\BackupController;
use App\Http\Controllers\Settings\GoogleController;
use App\Http\Controllers\Settings\MailController;
use App\Http\Controllers\Settings\MenuBuilderController;
use App\Http\Controllers\Settings\MenuController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Settings\SMSController;
use Illuminate\Support\Facades\Route;

// Accounts
Route::group(['as' => 'account.', 'prefix' => 'account'], function () {
    // Profile
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::post('/', [AccountController::class, 'store'])->name('store');
    Route::delete('/', [AccountController::class, 'destroy'])->name('destroy');
    // Password
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    // Email
    Route::get('/email', [EmailController::class, 'index'])->name('email.index');
    Route::post('/email', [EmailController::class, 'store'])->name('email.store');
    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Settings
Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
    // General
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::post('/', [SettingController::class, 'store'])->name('store');
    // Mail
    Route::get('mail', [MailController::class, 'index'])->name('mail.index');
    Route::post('mail', [MailController::class, 'store'])->name('mail.store');
    // SMS
    Route::get('sms', [SMSController::class, 'index'])->name('sms.index');
    Route::post('sms', [SMSController::class, 'store'])->name('sms.store');
    // Google
    Route::get('google', [GoogleController::class, 'index'])->name('google.index');
    Route::post('google', [GoogleController::class, 'store'])->name('google.store');
    // Roles
    Route::resource('roles', RoleController::class)->except('show');
    // Backups
    Route::resource('backups', BackupController::class)->only('index', 'store', 'destroy');
    Route::get('backups/download/{file_name}', [BackupController::class, 'download'])->name('backups.download');
    // Menus
    Route::resource('menus', MenuController::class)->except('show');
    Route::group(['as' => 'menus.', 'prefix' => 'menus/{menu}'], function () {
        Route::resource('builder', MenuBuilderController::class);
        Route::post('builder/move', [MenuBuilderController::class, 'move'])->name('builder.move');
    });
});
