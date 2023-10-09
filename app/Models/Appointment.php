<?php

namespace App\Models;

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

    public function team()
    {
        return $this->belongsTo(Team::class);
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
