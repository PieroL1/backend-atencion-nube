<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Soporte\ClaimsController;

// Auth pública
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    // Yo me pruebo a mí mismo (útil para el frontend)
    Route::get('/me', fn(\Illuminate\Http\Request $r) => $r->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    /** -------------------
     *  RECLAMOS (LISTO)
     *  -------------------*/
    Route::get('claims', [ClaimsController::class, 'index']);
    Route::post('claims', [ClaimsController::class, 'store']);
    Route::patch('claims/{id}', [ClaimsController::class, 'update']);
    Route::get('claims/{id}/assignments', [ClaimsController::class, 'assignments']);
    Route::post('claims/{id}/assignments', [ClaimsController::class, 'addAssignment']);

    /** -------------------------
     *  ATENCIÓN AL ESTUDIANTE
     *  (esqueleto – llenamos después)
     *  -------------------------*/
    Route::prefix('atencion')->group(function () {
        // RF1.1 registrar/seguir consultas o solicitudes
        Route::get('solicitudes', fn() => response()->json(['message' => 'pendiente'], 501));  // listado
        Route::post('solicitudes', fn() => response()->json(['message' => 'pendiente'], 501)); // crear

        // RF1.2 notificar estado (lo implemento con eventos/notifs luego)
        Route::patch('solicitudes/{id}/estado', fn() => response()->json(['message' => 'pendiente'], 501));

        // RF1.3 historial por usuario
        Route::get('historial', fn() => response()->json(['message' => 'pendiente'], 501));
    });

    /** Placeholders para otros módulos */
    Route::get('orientacion', fn() => response()->json(['message' => 'pendiente'], 501));
    Route::get('bienestar', fn() => response()->json(['message' => 'pendiente'], 501));
    Route::get('comunidad', fn() => response()->json(['message' => 'pendiente'], 501));
});
