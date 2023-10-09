<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'current_team_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($input)
    {
        if($input){
            $this->attributes['password'] = app('hash')->needsRehash($input) ? bcrypt($input) : $input;
        }
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot('role')->withTimestamps();
    }
    public function currentTeam()
    {
        return $this->belongsTo(Team::class, 'current_team_id');
    }

    public function setCurrentTeamRoleAttribute(){
        $role = $this->teams()->firstWhere('pivot.team_id', '=', $this->current_team_id);
        return $role;
    }
}
