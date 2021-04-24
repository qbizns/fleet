<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookingApi;
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
Route::namespace ('Api')->middleware(['throttle'])->group(function () {
 	Route::post('booking', [BookingApi::class, 'booking']);
 	Route::get('available_seats', [BookingApi::class, 'availableseats']);
    Route::get('buses', [BookingApi::class, 'buses']);
});
