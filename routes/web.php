<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MatchController;

// Laravel のルート設定
Route::post('/inputs/create', [DetailController::class, 'store']);
Route::get('/dashboard', [MatchController::class, 'index']);



// Catch-all ルート: Vue.js のルートに対応する
Route::get('/{any}', function () {
    return view('app'); // Vue.js のエントリーポイント
})->where('any', '.*');

Auth::routes();


