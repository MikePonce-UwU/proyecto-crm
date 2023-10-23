<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Admin|Team Supervisor|Team Collaborator|Main Salesman|Salesmen|Independiente'], ['only' => ['index']]);
        $this->middleware(['role:Admin|Team Supervisor|Team Collaborator|Independiente'], ['only' => ['store', 'create', 'update', 'edit']]);
        $this->middleware(['role:Admin'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.appointments.index', [
            'appointments' => Appointment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = auth()->user()->is_admin ?
            \App\Models\Customer::all() :
            \App\Models\Customer::where('team_id', auth()->user()->current_team_id)->get();
        $users = auth()->user()->is_admin ?
            \App\Models\User::all() :
            \App\Models\User::where('current_team_id', auth()->user()->current_team_id)->get();
        // dd($users);
        return view('pages.appointments.create', [
            'customers' => $clientes,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        //
        $validatedData = $request->validated();
        // dd($validatedData['contact_name']);
        $userData = User::find($validatedData['user_id']);
        $appointment = Appointment::create([
            'customer_id' => $validatedData['customer_id'],
            'description' => $validatedData['description'],
            'appointment_date' => $validatedData['appointment_date'],
            'user_id' => $userData->id,
            'team_id' => $userData->current_team_id,
        ]);
        return redirect()->route('admin.appointments.index')->with('appointment-success', 'Appointment set successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
        return view('pages.appointments.edit', [
            'appointment' => $appointment,
            'customers' => Customer::all()->pluck('first_name', 'id'),
            'users' => User::all()->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
        $appointment->update($request->validated());
        return redirect()->route('admin.appointments.index')->with('appointment-success', 'Appointment modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('appointment-success', 'Appointment deleted successfully!');
    }
}
