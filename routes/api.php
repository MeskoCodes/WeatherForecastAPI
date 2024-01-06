<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VremenskaStanicaController;
use App\Http\Controllers\LokacijaController;
use App\Http\Controllers\PadavineController;
use App\Http\Controllers\ObavijestiController;
use App\Http\Controllers\PrognozaController;
use App\Http\Controllers\VremenskiUsloviController;
use App\Http\Controllers\KvalitetVazduhaController;

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

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth:sanctum' ], function () {
    
    Route::apiResource('vremenska_stanica', VremenskaStanicaController::class);
    Route::apiResource('lokacija', LokacijaController::class);
    Route::apiResource('kvalitet_vazduha', KvalitetVazduhaController::class);
    Route::apiResource('obavijesti', ObavijestiController::class);
    Route::apiResource('padavine', PadavineController::class);
    Route::apiResource('prognoza', PrognozaController::class);
    Route::apiResource('vremenski_uslovi', VremenskiUsloviController::class);
    Route::post('vremenski_uslovi/bulk', ['uses'=>'VremenskiUsloviController@bulkStore']);
    Route::post('lokacija/bulk', ['uses'=>'LokacijaController@bulkStore']);
    Route::post('prognoza/bulk', ['uses'=>'PrognozaController@bulkStore']);
    Route::post('padavine/bulk', ['uses'=>'PadavineController@bulkStore']);
    Route::post('kvalitet_vazduha/bulk', ['uses'=>'KvalitetVazduhaController@bulkStore']);
    Route::post('obavijesti/bulk', ['uses'=>'ObavijestiController@bulkStore']);
});
