<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_no',
        'name',
        'passport_number',
        'phone',
        'email',
        'destination_country',
        'profession',
        'notes',
        'status',
        'admin_remarks',
    ];

    /**
     * Generate unique tracking code before creation
     */
    protected static function booted()
    {
        static::creating(function ($application) {
            if (empty($application->tracking_no)) {
                $application->tracking_no = 'AFI-' . date('Y') . '-' . strtoupper(substr(uniqid(), -5));
            }
        });
    }
}
