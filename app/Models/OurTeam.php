<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory, \App\Traits\HasTranslations;
    protected $fillable = [
        'name',
        'name_bn',
        'email',
        'phone',
        'phone_bn',
        'designation',
        'designation_bn',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'experience',
        'experience_bn',
        'biography',
        'biography_bn',
        'image',
    ];

    public function getNameAttribute($value)
    {
        return $this->getTranslated('name', $value);
    }
    
    public function getPhoneAttribute($value)
    {
        return $this->getTranslated('phone', $value);
    }

    public function getDesignationAttribute($value)
    {
        return $this->getTranslated('designation', $value);
    }

    public function getExperienceAttribute($value)
    {
        return $this->getTranslated('experience', $value);
    }

    public function getBiographyAttribute($value)
    {
        return $this->getTranslated('biography', $value);
    }
}
