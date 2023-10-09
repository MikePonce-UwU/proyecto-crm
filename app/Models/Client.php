<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'company_name',
        'company_address',
        'company_phone_number',
        'team_id',
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
