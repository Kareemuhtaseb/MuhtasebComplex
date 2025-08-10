<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;

Route::apiResource('properties', PropertyController::class);
Route::apiResource('units', UnitController::class);
