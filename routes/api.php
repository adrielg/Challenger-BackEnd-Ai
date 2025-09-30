<?php

use App\Http\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/items', [ProductController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ProductController::class, 'search'])->name('items.search');

