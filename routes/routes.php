<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth', 'verified'],
    'as' => 'admin.'
], function () {
    Route::resource('teams', TeamController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);
});