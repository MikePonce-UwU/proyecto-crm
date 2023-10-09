<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\User;

class TeamController extends Controller
{
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
        return view('pages.teams.create');
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
        // dd($team->users->contains(auth()->id()));
        // $associated = $team->users->contains(auth()->id());
        return view('pages.teams.edit', ['team' => $team]);
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
        // $user_list = $user_list->filter(fn($key) => $key = $key);
        // dd($user_list);
        // dd($request->all());
        $team->update($request->validated());
        $team->users()->sync([]);
        if (count($user_list) >= 1) {
            foreach ($user_list as $key => $user) {
                // var_dump($user);
                // if($c = $team->users()->where('id', $user->user_id)){

                //     $team->users()->detach($user->user_id);
                // }

                $team->users()->attach($user->user_id, ['role' => $user->role]);
                $u = \App\Models\User::findOrFail($user->user_id);
                $u->currentTeam()->dissociate();                
                $u->currentTeam()->associate($team);       
                $u->save();         
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
        foreach ($team->members as $user) {
            # code...
            $user->currentTeam()->dissociate();
        }
        foreach ($team->clients as $client) {
            # code...
            $client->team()->dissociate();
        }
        foreach ($team->appointments as $appointment) {
            # code...
            $appointment->team()->dissociate();
        }

        $team->delete();
        return redirect()->route('admin.teams.index')->with('team-success', 'Team deleted successfully');
    }
}
