<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

// Mengelompokkan seluruh rute dengan prefix v1
Route::prefix('v1')->group(function() {
    
    // Rute Otentikasi (Publik)
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    // Rute Terproteksi (Harus melalui auth Sanctum)
    Route::middleware('auth:sanctum')->group(function() {
        
        // Rute Manajemen Kategori
        Route::apiResource('categories', CategoryController::class)->except(['destroy']); 
        Route::delete('categories/{category}', [CategoryController::class, 'destroy']) 
            ->middleware('role:admin'); 

        // Rute Manajemen Item
        Route::apiResource('items', ItemController::class)->except(['destroy']); 
        Route::delete('items/{item}', [ItemController::class, 'destroy']) 
            ->middleware('role:admin'); 
    });
});