<?php

use App\Http\Controllers\Backend\Modules\UserModule\FileProcessing\FileProcessingController;
use Illuminate\Support\Facades\Route;


Route::prefix('file_processing')->name('file_processing.')->group(function () {
    Route::get("", [FileProcessingController::class, 'index'])->name("index");
    Route::get("data", [FileProcessingController::class, 'data'])->name("data");
    Route::get("create/modal", [FileProcessingController::class, 'createModal'])->name("create.modal");
    Route::post("create", [FileProcessingController::class, 'create'])->name("create");
});
