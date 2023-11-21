<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;
    public static array $allowedFields = [
        'date',
        'type',
        'user_id'
    ];

    public static array $allowedSorts = [
        'date',
        'created_at'
    ];

    public static array $allowedFilters = [
        'date',
        'user_id'
    ];

    protected static function booted()
    {
        static::creating(function ($report) {
            $report->user_id = auth()->id();
        });
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
