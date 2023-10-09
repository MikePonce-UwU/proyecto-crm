<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citas = \App\Models\Appointment::count();
        $clientes = \App\Models\Client::count();
        $users = \App\Models\User::count();
        return view('home', compact('citas', 'clientes', 'users'));
    }
}
