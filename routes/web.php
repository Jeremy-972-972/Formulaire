<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/',  [TaskController::class, 'index'])->name('home');
    Route::get('/create',  [TaskController::class, 'create'])->name('task.create');
    Route::post('/store',  [TaskController::class, 'store'])->name('task.store');
    Route::get('/edit/{task}',  [TaskController::class, 'edit'])->name('task.edit');
    Route::get('/update/{task}',  [TaskController::class, 'update'])->name('task.update');
    Route::get('/state/{id}',[TaskController::class, 'state'])->name('task.state');
    Route::get('/delete/{task}',[TaskController::class, 'delete'])->name('task.delete');
});




require __DIR__ . '/auth.php';
