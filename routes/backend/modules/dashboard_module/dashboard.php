<?php

use App\Http\Controllers\Backend\Modules\DashboardModule\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->name('dashboard.')->group(function () {
     Route::get("", [DashboardController::class, 'index'])->name("index");
});