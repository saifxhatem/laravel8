<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;






Route::get('/', function () {
    return view('welcome');
});



Route::get('registration', [RegistrationController::class, 'index']);
Route::post('store-data-registration', [RegistrationController::class, 'store']);

Route::get('insert-addresses', [AddressesController::class, 'index']);
Route::post('store-data', [AddressesController::class, 'store']);
Route::post('fetch-address', [AddressesController::class, 'fetch_address']);

Route::get('list-users', [UserController::class, 'index']); 
