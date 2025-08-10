<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgrammeEnrollment extends Model
{

    protected $fillable = [
        'user_id',
        'programme_id',
        'progress_percentage',
        'completed_modules_count',
        'completed_lessons_count',
        'status',
        'enrolled_at',
        'started_at',
        'completed_at',
        'last_accessed_at',
        'certificate_issued',
        'certificate_issued_at',
        'certificate_url',
    ];

    protected $casts = [
        'progress_percentage' => 'decimal:2',
        'certificate_issued' => 'boolean',
        'enrolled_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'last_accessed_at' => 'datetime',
        'certificate_issued_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'active' => 'En cours',
            'paused' => 'En pause',
            'completed' => 'Terminé',
            'abandoned' => 'Abandonné',
            default => 'Inconnu'
        };
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function getProgressBadgeClass(): string
    {
        return match(true) {
            $this->progress_percentage >= 100 => 'badge-success',
            $this->progress_percentage >= 75 => 'badge-info',
            $this->progress_percentage >= 50 => 'badge-warning',
            $this->progress_percentage >= 25 => 'badge-secondary',
            default => 'badge-light'
        };
    }
}
