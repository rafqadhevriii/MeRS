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
        'screening_token',
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

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function answers(): HasMany
    {
        return $this->hasMany(ScreeningAnswer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | AUTO DELETE CHILD RECORDS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::deleting(function ($screening) {
            $screening->answers()->delete();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER METHODS
    |--------------------------------------------------------------------------
    */

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public static function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', now());
    }

    public static function defaultExpiry(): Carbon
    {
        return now()->addDays(30);
    }
}
