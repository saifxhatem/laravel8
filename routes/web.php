<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RetrieveAddressController;




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



Route::get('addresses', [AddressesController::class, 'index']);
Route::post('store-data', [AddressesController::class, 'store']);

Route::get('registration', [RegistrationController::class, 'index']);
Route::post('store-data-registration', [RegistrationController::class, 'store']);

Route::get('get-address', [RetrieveAddressController::class, 'index']);
Route::post('do-get-address', [RetrieveAddressController::class, 'get_address']);
