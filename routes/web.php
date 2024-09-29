<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;

// Laravel のルート設定
Route::post('/inputs/create', [DetailController::class, 'store']);




// Catch-all ルート: Vue.js のルートに対応する
Route::get('/{any}', function () {
    return view('app'); // Vue.js のエントリーポイント
})->where('any', '.*');

Auth::routes();


