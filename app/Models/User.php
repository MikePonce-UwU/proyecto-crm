<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

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
        'current_role_id',
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

    public function getIsAdminAttribute()
    {
        return Str::contains($this->attributes['email'], '@admin.com');
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
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

    public function getCurrentTeamRoleAttribute()
    {
        return $this->teams()->firstWhere('team_id', '=', $this->attributes['current_team_id'])->pivot->role ?? null;
    }

    /**
     * Determine if the model has (one of) the given role(s).
     *
     * @param  string|int|array|\Illuminate\Support\Collection  $roles
     */
    // public function hasGlobalRole($roles){
    //     if (is_string($roles) && false !== strpos($roles, '|')) {
    //         $roles = explode('|', $roles);
    //     }
    //     if (is_string($roles)) {
    //         return $roles === $this->currentRole->name;
    //     }
    //     if (is_int($roles)) {

    //         return $this->attributes['current_role_id'] === $roles;
    //     }
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasGlobalRole($role)) {
    //                 return true;
    //             }
    //         }

    //         return false;
    //     }
    //     return $roles->intersect($this->currentRole->name)->isNotEmpty();
    // }

    public function getFirstNameAttribute()
    {
        $name = explode(' ', $this->attributes['name'], 2);
        return $name[0];
    }
    /**
     * Determine if the model has (one of) the given role(s).
     *
     * @param  string|array|\Illuminate\Support\Collection  $roles
     */
    // public function hasTeamRole($roles){
    //     if (is_string($roles) && false !== strpos($roles, '|')) {
    //         $roles = explode('|', $roles);
    //     }
    //     if (is_string($roles)) {
    //         return $roles === $this->currentTeamRole;
    //     }
    //     // if (is_int($roles)) {

    //     //     return $this->attributes[''] === $roles;
    //     // }
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasGlobalRole($role)) {
    //                 return true;
    //             }
    //         }

    //         return false;
    //     }
    //     return $roles->intersect($this->currentTeamRole)->isNotEmpty();
    // }

    // public function currentRole()
    // {
    //     return $this->belongsTo(Role::class, 'current_role_id');
    // }

    // public function getCurrentGlobalRoleAttribute()
    // {
    //     if (!$this->is_admin) {
    //         if ($this->attributes['current_role_id'] !== null) {
    //             return $this->currentRole->name;
    //         }
    //         // else return null;
    //     } else {
    //         return 'SuperAdmin';
    //     }
    // }
    public function myTeam()
    {
        return $this->hasOne(Team::class, 'manager_id');
    }
    public function myAppts()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
    public function myCustomers()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }
}
