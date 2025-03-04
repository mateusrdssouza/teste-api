<?php

use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)->only([
    'index',
    'store',
]);
