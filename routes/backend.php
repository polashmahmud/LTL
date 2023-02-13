<?php

use App\Http\Controllers\Backend\MenuBuilderController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resource('roles', RoleController::class)->except('show');

// Menus
Route::resource('menus', MenuController::class)->except('show');
Route::group(['as' => 'menus.', 'prefix' => 'menus/{menu}'], function () {
    Route::resource('builder', MenuBuilderController::class);
    Route::post('builder/move', [MenuBuilderController::class, 'move'])->name('builder.move');
});
