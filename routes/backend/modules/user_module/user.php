<?php

use App\Http\Controllers\Backend\Modules\UserModule\User\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->name('user.')->group(function () {
     Route::get("", [UserController::class, 'index'])->name("index");
     Route::get("data", [UserController::class, 'data'])->name("data");
     Route::get("create", [UserController::class, 'createModal'])->name("create.modal");
     Route::post("create", [UserController::class, 'create'])->name("create");
     Route::get("update/{id}", [UserController::class, 'updateModal'])->name("update.modal");
     Route::post("update/{id}", [UserController::class, 'update'])->name("update");
     Route::get("reset-password/{id}", [UserController::class, 'resetPasswordModal'])->name("reset.password.modal");
     Route::post("reset-password/{id}", [UserController::class, 'resetPassword'])->name("reset.password");
     Route::get("permission/{id}", [UserController::class, 'permissionModal'])->name("permission.modal");
     Route::post("permission/{id}", [UserController::class, 'permission'])->name("permission");
});