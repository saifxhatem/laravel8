<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopGovController;






Route::get('/', function () {
    return view('welcome');
});



Route::get('registration', [RegistrationController::class, 'index']);
Route::post('store-data-registration', [RegistrationController::class, 'store']);

Route::get('insert-addresses', [AddressesController::class, 'index']);
Route::post('store-data', [AddressesController::class, 'store']);
Route::post('fetch-address', [AddressesController::class, 'fetch_address']);
Route::get('list-all-addresses', [AddressesController::class, 'list_all_addresses']);
Route::post('edit-address', [AddressesController::class, 'edit_address']);
Route::post('update-address', [AddressesController::class, 'update_address']);


Route::get('list-users', [UserController::class, 'index']);

Route::get('top-gov', [TopGovController::class, 'list_top_gov']);
