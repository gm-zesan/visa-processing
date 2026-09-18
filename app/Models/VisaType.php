<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class VisaType extends Model
{
    use HasFactory, HasSlug, \App\Traits\HasTranslations;

    protected $fillable = [
        'name',
        'name_bn',
        'slug',
        'country_details_id',
        'image',
        'description',
        'description_bn',
        'visa_category',
        'visa_category_bn',
        'issuing_authority',
        'issuing_authority_bn',
        'processing_time',
        'processing_time_bn',
        'contract_period',
        'contract_period_bn',
        'emigration_clearance',
        'emigration_clearance_bn',
        'processing_steps',
        'processing_steps_bn',
    ];

    protected $casts = [
        'processing_steps' => 'array',
        'processing_steps_bn' => 'array',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }

    public function countryDetails()
    {
        return $this->belongsTo(CountryDetails::class, 'country_details_id');
    }

    public function getNameAttribute($value)
    {
        return $this->getTranslated('name', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getTranslated('description', $value);
    }

    public function getVisaCategoryAttribute($value)
    {
        return $this->getTranslated('visa_category', $value);
    }

    public function getIssuingAuthorityAttribute($value)
    {
        return $this->getTranslated('issuing_authority', $value);
    }

    public function getProcessingTimeAttribute($value)
    {
        return $this->getTranslated('processing_time', $value);
    }

    public function getContractPeriodAttribute($value)
    {
        return $this->getTranslated('contract_period', $value);
    }

    public function getEmigrationClearanceAttribute($value)
    {
        return $this->getTranslated('emigration_clearance', $value);
    }

    public function getProcessingStepsAttribute($value)
    {
        if (request()->is('dashboard*')) return is_string($value) ? json_decode($value, true) ?? [] : ($value ?? []);
        $val = $this->getTranslated('processing_steps', $value);
        return is_string($val) ? json_decode($val, true) ?? [] : ($val ?? []);
    }
}
