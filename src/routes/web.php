<?php

use Illuminate\Support\Facades\Route;
use YogiGr\TodoList\Http\Controllers\TodoListController;

Route::middleware(['web', 'auth', 'verified', 'main.menu'])->group(function() {
    Route::resource('/todo', TodoListController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']);
});