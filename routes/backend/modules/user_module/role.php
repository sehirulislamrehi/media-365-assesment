<?php

use App\Http\Controllers\Backend\Modules\UserModule\Role\RoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('role')->name('role.')->group(function () {
     Route::get("", [RoleController::class, 'index'])->name("index");
     Route::get("data", [RoleController::class, 'data'])->name("data");
     Route::get("create", [RoleController::class, 'createModal'])->name("create.modal");
     Route::post("create", [RoleController::class, 'create'])->name("create");
     Route::get("update/{id}", [RoleController::class, 'updateModal'])->name("update.modal");
     Route::post("update/{id}", [RoleController::class, 'update'])->name("update");
});