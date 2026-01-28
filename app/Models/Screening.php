<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Screening extends Model
{
    protected $table = 'screenings';

    protected $fillable = [
        'session_id',
        'phq9_score',
        'gad7_score',
        'pcl5_score',
        'risk_level',
        'emergency_flag',
        'emergency_reason',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'emergency_flag' => 'boolean',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(ScreeningAnswer::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public static function defaultExpiry(): Carbon
    {
        return now()->addDays(30);
    }
}
