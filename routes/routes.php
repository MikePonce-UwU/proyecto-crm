<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth', 'verified'],
    'as' => 'admin.'
], function () {
    Route::resource('appointments', AppointmentController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('users', UserController::class);
});