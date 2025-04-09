<?php

use App\Http\Controllers\PlantNetController;
use App\Http\Controllers\PlantsController;
use Illuminate\Support\Facades\Route;

Route::post('/identify-plant', [PlantNetController::class, 'identify']);

Route::get('plants', [PlantsController::class, 'index']);