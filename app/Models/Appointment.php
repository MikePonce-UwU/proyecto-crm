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
        'customer_id',
        'description',
        'appointment_date',
    ];
    protected $casts = [
        'appointment_date' => 'datetime:Y-m-d H:i:s',
    ];

    // public function getAppointmentDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d');
    // }
    // public function setAppointmentDateAttribute($value)
    // {
    //     $date = new Carbon($value);
    //     $this->attributes['appointment_date'] = $date->format('Y-m-d');
    // }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public static function boot(): void
    // {
    //     parent::boot();
    //     if (!auth()->user()->is_admin || auth()->user()->currentGlobalRole !== 'Salesmen') {
    //         if (auth()->check()) {
    //             static::addGlobalScope('user', fn (Builder $query) => $query);
    //         }
    //     }
    // }
    protected static function booted(): void
    {
        if (!auth()->user()->is_admin) {
            if (!auth()->user()->hasAnyRole(['Admin', 'Main Salesman', 'Salesmen'])) {
                if (auth()->check()) {
                    static::addGlobalScope('team', function (Builder $query) {
                        $query
                            ->where('team_id', auth()->user()->current_team_id)
                            ->where('user_id', auth()->id());
                        // or with a `team` relationship defined:
                        // $query->whereBelongsTo(auth()->user()->team);
                    });
                }
            
            } else if (auth()->user()->hasRole(['Salesmen', 'Team Collaborator', 'Team Supervisor', 'Independiente'])){
                static::addGlobalScope('team', function (Builder $query) {
                    $query
                        ->where('team_id', auth()->user()->myTeam->id)
                        /*->where('user_id', auth()->id())*/;
                    // or with a `team` relationship defined:
                    // $query->whereBelongsTo(auth()->user()->team);
                });
            }
        }
    }
    
}
