<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programme extends Model
{

    protected $fillable = [
        'slug',
        'title',
        'description',
        'short_description',
        'cover_image_url',
        'icon_url',
        'category',
        'difficulty_level',
        'estimated_hours',
        'prerequisites',
        'tags',
        'language',
        'enrolled_count',
        'completion_count',
        'average_rating',
        'is_published',
        'is_free',
        'price',
        'created_by',
        'published_at',
    ];

    protected $casts = [
        'prerequisites' => 'array',
        'tags' => 'array',
        'is_published' => 'boolean',
        'is_free' => 'boolean',
        'price' => 'decimal:2',
        'average_rating' => 'decimal:1',
        'published_at' => 'datetime',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->orderBy('order_index');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(ProgrammeEnrollment::class);
    }

    public function activeEnrollments(): HasMany
    {
        return $this->hasMany(ProgrammeEnrollment::class)->where('status', 'active');
    }

    public function getDifficultyLabelAttribute(): string
    {
        return match($this->difficulty_level) {
            1 => 'Débutant',
            2 => 'Facile',
            3 => 'Intermédiaire',
            4 => 'Avancé',
            5 => 'Expert',
            default => 'Non défini'
        };
    }

    public function getProgressForUser($userId): ?ProgrammeEnrollment
    {
        return $this->enrollments()->where('user_id', $userId)->first();
    }

    public function isEnrolledByUser($userId): bool
    {
        return $this->enrollments()->where('user_id', $userId)->exists();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByDifficulty($query, $difficulty)
    {
        return $query->where('difficulty_level', $difficulty);
    }
}
