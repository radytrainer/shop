<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('items', [ItemController::class, 'index']);
Route::get('items/{id}', [ItemController::class, 'show']);
Route::get('items/search/{name}', [ItemController::class, 'search']);

Route::post('items', [ItemController::class, 'store']);
Route::put('items/{id}', [ItemController::class, 'update']);
Route::delete('items/{id}', [ItemController::class, 'destroy']);