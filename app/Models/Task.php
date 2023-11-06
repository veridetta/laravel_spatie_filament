<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    public static array $allowedFields = [
        'report_id',
        'division',
        'task',
        'description',
        'image'
    ];

    public static array $allowedSorts = [
        'division',
        'task',
        'created_at'
    ];

    public static array $allowedFilters = [
        'division',
        'task'
    ];
    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

}
