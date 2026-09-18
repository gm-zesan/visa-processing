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
        'designation',
        'designation_bn',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'experience',
        'biography',
        'biography_bn',
        'image',
    ];

    public function getNameAttribute($value)
    {
        return $this->getTranslated('name', $value);
    }

    public function getDesignationAttribute($value)
    {
        return $this->getTranslated('designation', $value);
    }

    public function getBiographyAttribute($value)
    {
        return $this->getTranslated('biography', $value);
    }
}
