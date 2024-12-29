<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::middleware([
    'auth',
])->group(function (): void {
    Route::get('/profile', fn () => view('auth.profile'))->name('auth.profile');
});

Route::middleware([
    'auth',
    'verified',
])->group(function (): void {
    Route::get('/home', fn () => view('home'))->name('home');
});
