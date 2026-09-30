<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publikasi;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/publikasi/tambah', [publikasi::class, 'create'])->name('tambah');
Route::post('/publikasi', [publikasi::class, 'store'])->name('publikasi.store');
Route::get('/publikasi/{id}/edit', [publikasi::class, 'edit'])->name('publikasi.edit');
Route::put('/publikasi/{id}', [publikasi::class, 'update'])->name('publikasi.update');
Route::delete('/publikasi/{id}', [publikasi::class, 'destroy'])->name('publikasi.destroy');

Route::get('/publikasi', [publikasi::class, 'index'])->name('publikasi');