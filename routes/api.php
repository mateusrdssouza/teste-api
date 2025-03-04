<?php

use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy'
]);

Route::apiResource('clients', CompanyController::class)->only([
    'index',
]);
