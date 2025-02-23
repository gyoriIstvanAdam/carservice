<?php

use App\Http\Controllers\CarserviceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarserviceController::class, 'index'])->name('ListClients');
Route::get('/{clientId}/cars', [CarserviceController::class, 'getClientCars'])->name('Home');
Route::get('{carId}/services', [CarserviceController::class, 'getCarServices']);
Route::get('/search', [CarserviceController::class, 'search'])->name('clients.search');
