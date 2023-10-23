<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Role;
use App\Models\User;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin|Main Salesman'], ['only' => ['index']]);
        $this->middleware(['role:Admin'], ['only' => ['store', 'create', 'update', 'edit']]);
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
        return view('pages.teams.index', [
            'teams' => Team::withCount('users')->get(),
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
        $users = User::whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->get()->pluck('name', 'id');
        return view('pages.teams.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        //
        $tenant = Team::create($request->validated());
        if (count(json_decode($request->user_list)) >= 1) {
            foreach (json_decode($request->user_list) as $user) {
                $tenant->users()->attach($user->user_id, ['role' => $user->role]);

                $local_user = User::findOrFail($user->user_id);
                $local_user->update(['current_team_id' => $tenant->id]);
                // $local_user->currentRole()->dissociate();
                // if ($user->role == 'supervisor')
                //     $local_user->currentRole()->associate(Role::firstWhere('name', 'Team Supervisor'));
                // else
                //     $local_user->currentRole()->associate(Role::firstWhere('name', 'Team Collaborator'));
                // $local_user->save();
            }
        }

        return redirect()->route('admin.teams.index')->with('team-success', 'Team created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $users = User::whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->get()->pluck('name', 'id');
        return view('pages.teams.edit', ['team' => $team, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $user_list = json_decode($request->user_list);
        $team->update($request->validated());
        $team->users()->sync([]);
        if (count($user_list) >= 1) {
            foreach ($user_list as $key => $_user) {
                $team->users()->attach($_user->user_id, ['role' => $_user->role]);
                $u = \App\Models\User::findOrFail($_user->user_id);
                $u->currentTeam()->dissociate();
                $u->currentTeam()->associate($team);

                // $u->currentRole()->dissociate();
                // if ($_user->role == 'supervisor')
                //     $u->currentRole()->associate(Role::firstWhere('name', 'Team Supervisor'));
                // else
                //     $u->currentRole()->associate(Role::firstWhere('name', 'Team Collaborator'));
                // $u->save();
            }
        }
        return redirect()->route('admin.teams.index')->with('team-success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        if ($team->members !== null && count($team->members) > 0) {
            foreach ($team->members as $user) {
                # code...
                $user->currentTeam()->dissociate();
            }
        }
        if ($team->clients !== null && count($team->clients) > 0) {
            foreach ($team->clients as $client) {
                # code...
                $client->team()->dissociate();
            }
        }
        if ($team->appointments !== null && count($team->appointments) > 0) {
            foreach ($team->appointments as $appointment) {
                # code...
                $appointment->team()->dissociate();
            }
        }

        $team->delete();
        return redirect()->route('admin.teams.index')->with('team-success', 'Team deleted successfully');
    }
}
