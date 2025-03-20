<?php

use App\Http\Controllers\PlantNetController;
use Illuminate\Support\Facades\Route;

Route::post('/identify-plant', [PlantNetController::class, 'identify']);
