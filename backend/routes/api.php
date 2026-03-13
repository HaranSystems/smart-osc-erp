<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApplicationController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Laravel API is working',
        'system' => 'Smart OSC ERP'
    ]);
});

Route::get('/applications', [ApplicationController::class, 'index']);
Route::post('/applications', [ApplicationController::class, 'store']);
Route::get('/applications/{id}', [ApplicationController::class, 'show']);
Route::put('/applications/{id}', [ApplicationController::class, 'update']);
Route::patch('/applications/{id}', [ApplicationController::class, 'update']);
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);
Route::prefix('v1')->group(function () {Route::apiResource('applications', ApplicationController::class);});
