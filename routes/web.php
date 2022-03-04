<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

Route::pattern('id', '(\d+)');

Route::get('/', [TodoController::class, 'index'])->name('todos');
Route::get('/{id}', [TodoController::class, 'show'])->name('todo.show');
Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');

Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/statusToggle/{id}', [TodoController::class, 'statusToggle'])->name('todo.status');
Route::post('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');