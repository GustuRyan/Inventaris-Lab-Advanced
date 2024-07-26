<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\CartMiddleware;

Route::middleware(CartMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('user.pages.homepage');
    })->name('dashboard');
    Route::post('/dashboard-recommend', [RecommendController::class, 'recommend'])->name('recommend');
    Route::get('/fakultas/{faculty}', [RoomController::class, 'faculty'])->name('fakultas');
    Route::get('/barang/{major}/{filter}', [RoomController::class, 'major'])->name('alat-bahan');
    Route::get('/barang', function () {
        return view('user.pages.tools');
    })->name('barang');
    Route::get('/laporan-barang/{room}', [RoomController::class, 'generatePDF'])->name('laporan.barang');
    Route::get('/peminjaman/{id}', [TransactionController::class, 'index'])->name('peminjaman');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('trans.add');
    Route::get('/laporan-nota/{id}', [TransactionController::class, 'generatePDF'])->name('laporan.trans');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
});
Route::prefix('auth')->group(function () {
    Route::get('/{auth}', [LoginController::class, 'index'])->name('authentication');
    Route::post('/sign-in', [LoginController::class, 'login'])->name('sign-in');
    Route::post('/sign-up', [RegisterController::class, 'regist'])->name('sign-up');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});