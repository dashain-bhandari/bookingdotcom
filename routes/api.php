<?php

use App\Http\Controllers\Apartment\ApartmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Owner\PropertyController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\PropertySearchController;
use App\Http\Controllers\User\PropertyShowController;
use App\Http\Middleware\GateDefineMiddleware;
use App\Http\Middleware\Trys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
   return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
   Route::prefix("auth")->group(function () {
      Route::post('/register', [AuthController::class, "register"]);
   });
});

Route::controller(ApartmentController::class)->prefix("apartments")->group(function () {
   Route::get('/{apartment}', 'show');
});

Route::controller(PropertySearchController::class)->prefix("users")->group(function () {
   Route::get('/', 'index');
});
Route::get('properties/{property}',PropertyShowController::class);

Route::middleware(["auth:sanctum", GateDefineMiddleware::class])->group(function () {
   Route::controller(BookingController::class)->prefix("bookings")->group(function () {
      Route::get('/', 'index');
   });
   Route::controller(PropertyController::class)->prefix("properties")->group(function () {
      Route::post('/', 'store');
   });

   Route::controller(ApartmentController::class)->prefix("apartments")->group(function () {
      Route::post('/', 'store');
   });
});

Route::get('/properties', [PropertyController::class, 'index']);
