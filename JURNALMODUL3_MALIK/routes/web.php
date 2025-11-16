<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
# 1. Import controller yang akan digunakan


# 2. Tambahkan route untuk halaman dashboard dengan metode GET yang memanggil fungsi index() dari DashboardController.
Route::get('/', [DashboardController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
# 3. Tambahkan route untuk halaman profil dengan metode GET yang memanggil fungsi index() dari ProfileController.
