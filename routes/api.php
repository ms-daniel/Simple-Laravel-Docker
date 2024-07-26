<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstrategiaWmsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('estrategiaWMS')->group(function () {
    Route::get('/', [EstrategiaWmsController::class, 'index']);
    Route::get('/{cdEstrategia}/{dsHora}/{dsMinuto}/prioridade', [EstrategiaWmsController::class, 'showPrioridade']);

    Route::post('/', [EstrategiaWmsController::class, 'store']);
    Route::get('/{id}', [EstrategiaWmsController::class, 'show']);
    Route::put('/{id}', [EstrategiaWmsController::class, 'update']);
    Route::delete('/{id}', [EstrategiaWmsController::class, 'destroy']);
});
