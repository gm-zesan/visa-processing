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
     * Cast attributes to native types / Enums
     */
    protected $casts = [
        'status' => ApplicationStatus::class,
    ];

    /**
     * Get the documents for the application.
     */
    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }
}
