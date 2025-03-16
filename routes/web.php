<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationUIController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/translations/ui', [TranslationUIController::class, 'index'])->middleware('auth');
