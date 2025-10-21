<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // Rota de teste
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Proximos cruds e rotas protegidas aqui

    Route::post('/logout', [AuthController::class, 'logout']);
});