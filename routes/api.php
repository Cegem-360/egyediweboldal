<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarImportController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Car Import API Routes
Route::prefix('cars')->group(function () {
    // Get reference data (categories, types, etc.)
    Route::get('/reference', [CarImportController::class, 'getReference']);
    
    // Download CSV template
    Route::get('/import/template', [CarImportController::class, 'getTemplate']);
    
    // Import single car
    Route::post('/import/single', [CarImportController::class, 'importSingle']);
    
    // Import multiple cars (batch)
    Route::post('/import/batch', [CarImportController::class, 'importBatch']);
    
    // Import from CSV file
    Route::post('/import/csv', [CarImportController::class, 'importCsv']);
});