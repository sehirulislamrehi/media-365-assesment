<?php

use App\Http\Controllers\Backend\Modules\UserModule\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('', [LoginController::class, 'loginPage'])->name('admin.login.page');
Route::post('do/login', [LoginController::class, 'doLogin'])->name('admin.do.login');
Route::post('do/logout', [LoginController::class, 'doLogout'])->name('admin.do.logout');

Route::middleware('admin.auth')->prefix("admin")->name('admin.')->group(function () {
     require_once "modules/dashboard_module/dashboard.php";

     //user module
     Route::prefix('user-module')->name('user-module.')->group(function () {
          require_once "modules/user_module/user.php";
          require_once "modules/user_module/role.php";
          require_once "modules/user_module/file_processing.php";
     });
     //user module end

});
