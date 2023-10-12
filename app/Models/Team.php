<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

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
}
