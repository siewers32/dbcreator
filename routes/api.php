<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('customers', CustomerController::class);
Route::resource('reservations', ReservationController::class);
//Route::get('/customers/first', [CustomerController::class, 'first']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
//Route::get('/reservations/{id}', [ReservationController::class, 'show']);