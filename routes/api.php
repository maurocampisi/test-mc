<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeerController;
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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:api')->group(function () {  
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/products', [BeerController::class, 'list' ])->name('api.beer.list');
});

