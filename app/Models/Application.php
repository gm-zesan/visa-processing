<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ApplicationStatus;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'passport_number',
        'phone',
        'email',
        'destination_country',
        'status',
    ];

    /**
     * Get the status safely as an ApplicationStatus enum or fallback
     */
    public function getStatusAttribute($value): ApplicationStatus
    {
        if ($value instanceof ApplicationStatus) {
            return $value;
        }
        if ($value === null || $value === '') {
            return ApplicationStatus::PENDING;
        }
        $normalized = strtolower(trim((string)$value));
        return ApplicationStatus::tryFrom($normalized) ?? ApplicationStatus::PENDING;
    }

    /**
     * Set the status attribute
     */
    public function setStatusAttribute($value): void
    {
        if ($value instanceof ApplicationStatus) {
            $this->attributes['status'] = $value->value;
        } elseif ($value !== null && $value !== '') {
            $this->attributes['status'] = strtolower(trim((string)$value));
        } else {
            $this->attributes['status'] = 'pending';
        }
    }

    /**
     * Get the documents for the application.
     */
    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }
}
