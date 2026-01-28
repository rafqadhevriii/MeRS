<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScreeningAnswer extends Model
{
    protected $table = 'screening_answers';

    protected $fillable = [
        'screening_id',
        'instrument',
        'question_index',
        'value',
    ];

    /**
     * Relasi ke screening utama
     */
    public function screening(): BelongsTo
    {
        return $this->belongsTo(Screening::class);
    }
}
