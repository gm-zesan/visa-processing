<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class VisaType extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'name',
        'slug',
        'country_details_id',
        'image',
        'description',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }

    // public function country()
    // {
    //     return $this->belongsTo(Country::class, 'country_id');
    // }

    public function countryDetails()
    {
        return $this->belongsTo(CountryDetails::class, 'country_details_id');
    }

    public function visa(){
        return $this->hasMany(Visa::class);
    }
}
