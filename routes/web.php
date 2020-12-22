<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;




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

Route::get('registration', [RegistrationController::class, 'index']); //done
Route::post('store-data-registration', [RegistrationController::class, 'store']); //done

//address controller

Route::get('insert-addresses', [AddressesController::class, 'index']); //done
Route::post('store-data', [AddressesController::class, 'store']); //done
Route::post('fetch-address', [AddressesController::class, 'fetch_address']); //done
//user controller
Route::get('list-users', [UserController::class, 'index']); //done
