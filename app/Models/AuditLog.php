<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_logs';

    protected $fillable = [
        'session_id',
        'screening_id',
        'event',
        'level',
        'message',
        'context',
    ];

    protected $casts = [
        'context' => 'array',
    ];
}
