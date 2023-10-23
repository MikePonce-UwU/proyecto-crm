<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/switch-team/{team}', function (?Team $team) {
    auth()->user()->currentTeam()->associate($team);
    auth()->user()->save();
    return back()->with('success', 'Team has been changed successfully to ' . $team->name);
})->name('switch.team');
// Route::get('/toggle-client/{client}', function (?Client $client) {
//     $client->sold = !$client->sold;
//     $client->save();
//     return back()->with('client-success', 'Client has been sold today: ' . $client->contact_name);
// })->name('admin.clients.toggle-sold');
