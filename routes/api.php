<?php

use App\Http\Controllers\Api\DocumentationController;
use App\Http\Controllers\Api\V1\MoodController;
use App\Http\Controllers\Api\V1\MoodEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/documentation/openapi.yaml', [DocumentationController::class, 'spec'])
    ->name('api.documentation.spec');
Route::get('/documentation', [DocumentationController::class, 'index'])
    ->name('api.documentation');

Route::prefix('v1')->group(function (): void {
    Route::get('/moods', [MoodController::class, 'index']);

    Route::get('/mood-entries', [MoodEntryController::class, 'index']);
    Route::post('/mood-entries', [MoodEntryController::class, 'store']);
});
