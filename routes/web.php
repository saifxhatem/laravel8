<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//registration controller

Route::get('registration', [RegistrationController::class, 'index']);
Route::post('store-data-registration', [RegistrationController::class, 'store']);

//address controller

Route::get('addresses', [AddressesController::class, 'index_insert']);
Route::post('store-data', [AddressesController::class, 'store']);
Route::get('get-address', [AddressesController::class, 'index_get']);
Route::post('do-get-address', [AddressesController::class, 'get_address']);
