<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDetails extends Model
{
    use HasFactory, \App\Traits\HasTranslations;

    protected $fillable = [
        'country_id',
        'image',
        'description',
        'description_bn',
        'subtitle',
        'subtitle_bn',
        'language',
        'language_bn',
        'processing_time',
        'processing_time_bn',
        'sectors',
        'sectors_bn',
        'worker_protections',
        'worker_protections_bn',
    ];

    protected $casts = [
        'sectors' => 'array',
        'sectors_bn' => 'array',
        'worker_protections' => 'array',
        'worker_protections_bn' => 'array',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function visa_types(){
        return $this->hasMany(VisaType::class);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getTranslated('description', $value);
    }

    public function getSubtitleAttribute($value)
    {
        return $this->getTranslated('subtitle', $value);
    }

    public function getLanguageAttribute($value)
    {
        return $this->getTranslated('language', $value);
    }

    public function getProcessingTimeAttribute($value)
    {
        return $this->getTranslated('processing_time', $value);
    }

    public function getSectorsAttribute($value)
    {
        $val = $this->getTranslated('sectors', $value);
        return is_string($val) ? json_decode($val, true) ?? [] : ($val ?? []);
    }

    public function getWorkerProtectionsAttribute($value)
    {
        $val = $this->getTranslated('worker_protections', $value);
        return is_string($val) ? json_decode($val, true) ?? [] : ($val ?? []);
    }
}
