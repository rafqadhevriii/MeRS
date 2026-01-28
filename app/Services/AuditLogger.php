<?php

namespace App\Services;

use App\Models\AuditLog;

class AuditLogger
{
    public function log(
        string $sessionId,
        ?int $screeningId,
        string $event,
        string $level,
        string $message,
        array $context = []
    ): void {
        AuditLog::create([
            'session_id' => $sessionId,
            'screening_id' => $screeningId,
            'event' => $event,
            'level' => $level,
            'message' => $message,
            'context' => $context,
        ]);
    }
}
