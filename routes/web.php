<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ThoughtController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('titles', TitleController::class);
    Route::resource('thoughts', ThoughtController::class);

    Route::post('/titles/{title}/thoughts', [ThoughtController::class, 'store'])
        ->name('thoughts.store');
        
});

require __DIR__.'/auth.php';
