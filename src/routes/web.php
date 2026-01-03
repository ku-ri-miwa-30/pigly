<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//step1画面
Route::get('/register/step1', function () {
    return view('register_1');
});

//step2画面遷移
Route::middleware('auth')->group(function () {
    Route::get('/register/step2', function () {
        return view('register_2');
    });
});

//ログイン画面
Route::get('/login', function () {
    return view('login');
});

//初期体重目標設定処理
Route::middleware('auth')->group(
    function () {
        Route::post('/register/step2', [AuthController::class, 'target_store']);
    }
);

//体重ログ画面
Route::middleware('auth')->group(
    function () {
        Route::get(
            '/weight_logs',
            [AuthController::class, 'weight_logs']
        );
    }
);

//データ追加画面
Route::middleware('auth')->group(
    function () {
        Route::get('/weight_logs/create', [AuthController::class, 'create']);
    }
);

//データ追加処理
Route::middleware('auth')->group(
    function () {

        Route::post('/weight_logs/create', [AuthController::class, 'log_store']);
    }
);

//検索処理
Route::middleware('auth')->group(
    function () {
        Route::post('/weight_logs/search', [AuthController::class, 'weight_logs']);
    }
);

//ログ詳細、編集画面
Route::middleware('auth')->group(
    function () {
        Route::get('/weight_logs/{log_id}', [AuthController::class, 'detail']);
    }
);

//更新処理
Route::middleware('auth')->group(
    function () {
        Route::post('/weight_logs/{log_id}/update', [AuthController::class, 'update']);
    }
);

//削除処理
Route::middleware('auth')->group(
    function () {
        Route::post('/weight_logs/{log_id}/delete', [AuthController::class, 'delete']);
    }
);
