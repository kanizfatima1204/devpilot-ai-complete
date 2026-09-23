<?php
use App\Http\Controllers\AiEmployeeController;
use Illuminate\Support\Facades\Route;
Route::get('/', [AiEmployeeController::class, 'index'])->name('dashboard');
Route::post('/ai-employee/run', [AiEmployeeController::class, 'run'])->name('ai.run');
Route::delete('/ai-runs/{run}', [AiEmployeeController::class, 'destroy'])->name('ai.destroy');
