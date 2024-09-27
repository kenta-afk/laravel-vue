<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

// Laravel のルート設定

// API 用のルートを /api にまとめる
Route::prefix('api')->group(function () {
    Route::get('/data', [DataController::class, 'index']);
    Route::post('/data', [DataController::class, 'store']);
});

// Catch-all ルート: Vue.js のルートに対応する
Route::get('/{any}', function () {
    return view('app'); // Vue.js のエントリーポイント
})->where('any', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
