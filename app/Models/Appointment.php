<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'client_id',
        'description',
        'appointment_date',
    ];
    protected $casts = [
        'appointment_date' => 'date',
    ];

    // public function getAppointmentDateAttribute()
    // {
    //     $date = new Carbon($this->attributes['appointment_date']);
    //     var_dump($date);
    //     return $date->format('Y-d-m');
    // }
    public function setAppointmentDateAttribute($value)
    {
        $date = new Carbon($value);
        $this->attributes['appointment_date'] = $date->format('Y-m-d');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted(): void
    {
        if (auth()->check()) {
            static::addGlobalScope('team', function (Builder $query) {
                $query->where('team_id', auth()->user()->current_team_id);
                // or with a `team` relationship defined:
                // $query->whereBelongsTo(auth()->user()->team);
            });
        }
    }
}
