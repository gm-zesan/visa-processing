<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'image',
        'description',
        'subtitle',
        'language',
        'processing_time',
        'sectors',
        'worker_protections',
    ];

    protected $casts = [
        'sectors' => 'array',
        'worker_protections' => 'array',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function visa_types(){
        return $this->hasMany(VisaType::class);
    }
}
