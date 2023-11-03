<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($report) {
            $report->user_id = auth()->id();
        });
    }
}
