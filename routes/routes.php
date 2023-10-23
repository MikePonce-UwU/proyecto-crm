<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ProfileController;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('profile', ProfileController::class)->middleware('auth')->name('profile');
Route::group([
    'middleware' => ['auth', 'verified'],
    'as' => 'admin.'
], function () {
    Route::resource('appointments', AppointmentController::class);
    Route::resource('customers', CustomerController::class);
    Route::post('customers/massCreate', [CustomerController::class, 'massCreate'])->name('customers.massCreate');
    Route::resource('teams', TeamController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::view('my-team', 'pages.myTeam')->middleware('role:Salesmen|Admin')->name('team.view');
    // Route::get('get-customers', function () {
    //     Excel::import(new CustomerImport, storage_path('customers.xlsx'));
    //     return redirect()->route('home')->with('message', 'Terminado');
    // })->name('customer.get');
});