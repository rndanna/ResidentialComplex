<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ResidentialComplexController;
use App\Http\Controllers\Api\LiterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'ResidentialComplex' => ResidentialComplexController::class,
    'Liter' => LiterController::class,
    'City' => CityController::class,
    'Apartment' => ApartmentController::class
]);
