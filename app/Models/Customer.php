<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'main_address',
        'secondary_address',
        'city',
        'state',
        'zip_code',
        'county',
        'phone_number',
        'owner_renter',
        'credit_rating',
        'home_value',
        'income',
        'age',
        'birth_month',
        'status',
        'team_id',
        'user_id',
    ];
    protected $casts = [
        // 'status' => StatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    protected static function booted(): void
    {
        if (!auth()->user()->is_admin) {
            if (!auth()->user()->hasAnyRole(['Salesmen', 'Main Salesman'])) {
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
