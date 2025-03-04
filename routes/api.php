<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy'
]);

Route::apiResource('clients', ClientController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy'
]);
