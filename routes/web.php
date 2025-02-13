<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;
use App\Http\Controllers\Admin\UserController;

// Ruta para la vista de usuarios (solo administradores)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/users/{user}/toggle', [UserController::class, 'toggleStatus'])->name('admin.users.toggle');
});

Route::get('/', BlogIndex::class);