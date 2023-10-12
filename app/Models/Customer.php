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
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'contact_address',
        'status',
        'team_id',
    ];
    protected $casts = [
        // 'status' => StatusEnum::class,
    ];

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
        if (auth()->check()) {
            static::addGlobalScope('team', function (Builder $query) {
                $query->where('team_id', auth()->user()->current_team_id);
                // or with a `team` relationship defined:
                // $query->whereBelongsTo(auth()->user()->team);
            });
        }
    }
}
