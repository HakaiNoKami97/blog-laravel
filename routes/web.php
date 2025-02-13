<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApiPostController;

Route::prefix('api-posts')->group(function () {
    Route::get('/', [ApiPostController::class, 'index'])->name('api.posts.index');
    Route::get('/create', [ApiPostController::class, 'create'])->name('api.posts.create');
    Route::post('/', [ApiPostController::class, 'store'])->name('api.posts.store');
    Route::get('/{id}', [ApiPostController::class, 'show'])->name('api.posts.show');
    Route::get('/{id}/edit', [ApiPostController::class, 'edit'])->name('api.posts.edit');
    Route::put('/{id}', [ApiPostController::class, 'update'])->name('api.posts.update');
    Route::delete('/{id}', [ApiPostController::class, 'destroy'])->name('api.posts.destroy');
});

// Ruta para la vista de usuarios (solo administradores)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/users/{user}/toggle', [UserController::class, 'toggleStatus'])->name('admin.users.toggle');
});

Route::get('/', BlogIndex::class);