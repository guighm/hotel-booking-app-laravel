<?php

use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'quartos' => QuartoController::class,
    'reservas' => ReservaController::class,
]);
