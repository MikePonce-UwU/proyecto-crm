<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'manager_id'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function appointments()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function team_users()
    {
        return $this->hasMany(User::class, 'current_team_id');
    }

    public function userAppts()
    {
        return $this->hasManyThrough(Appointment::class, User::class, 'current_team_id', 'user_id', 'id', 'id');
    }
}
