<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopGovController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AreaController;







Route::get('/', function () {
    return view('welcome');
});



Route::get('registration', [RegistrationController::class, 'index']);
Route::post('store-data-registration', [RegistrationController::class, 'store']);

Route::get('insert-addresses', [AddressesController::class, 'index']);
Route::post('store-data', [AddressesController::class, 'store']);
Route::post('fetch-address', [AddressesController::class, 'fetch_address']);
Route::get('fetch-address-by-id/{id}', [AddressesController::class, 'fetch_address_by_id']);
Route::get('address_id', [AddressesController::class, 'router_test']);

Route::get('list-addresses', [AddressesController::class, 'list_all_addresses']);
Route::get('fetch-user-addresses/{id}', [AddressesController::class, 'fetch_user_addresses']);
Route::get('addresses', [AddressesController::class, 'index']);
Route::post('edit-address', [AddressesController::class, 'edit_address']);
Route::post('update-address', [AddressesController::class, 'update_address']);


Route::get('users', [UserController::class, 'index']);
Route::post('auth', [LoginController::class, 'auth_login']);
Route::get('list-users', [UserController::class, 'get_users']);


Route::get('top-gov', [TopGovController::class, 'list_top_gov']);
Route::get('list-all-govs', [TopGovController::class, 'list_all_govs']);
Route::get('list-all-govs-paginated', [TopGovController::class, 'list_all_govs_paginated']);
Route::get('get-areas-in-gov/{id}', [TopGovController::class, 'get_areas_in_gov']);
Route::post('add-new-gov', [TopGovController::class, 'insert_new_gov']);
Route::post('add-new-area', [AreaController::class, 'add_area']);
