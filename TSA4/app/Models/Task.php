<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'task_date',
        'is_archived',
    ];

    protected function casts(): array
    {
        return [
            'task_date' => 'date',
            'is_archived' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('active', function (Builder $query) {
            $query->where('is_archived', false);
        });
    }

    public function scopeForDate(Builder $query, string $date): Builder
    {
        return $query->whereDate('task_date', $date);
    }

    public function scopeForToday(Builder $query): Builder
    {
        return $query->forDate(today()->toDateString());
    }
}
