<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

/*
|-------------------------------------------------
| TEST ROUTE
|-------------------------------------------------
*/
Route::get('test', function () {
    return response()->json(['message' => 'OK']);
});

/*
|-------------------------------------------------
| INVENTORY (LAMA - BIARKAN SAJA)
|-------------------------------------------------
*/
Route::apiResource('categories', CategoryController::class);
Route::apiResource('items', ItemController::class);

/*
|-------------------------------------------------
| LIBRARY (tugas saya)
|-------------------------------------------------
*/
Route::apiResource('genres', GenreController::class);
Route::apiResource('books', BookController::class);