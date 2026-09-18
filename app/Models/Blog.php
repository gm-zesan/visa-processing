<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Blog extends Model
{
    use HasFactory, HasSlug, \App\Traits\HasTranslations;
    protected $fillable = [
        'category_id',
        'title',
        'title_bn',
        'slug',
        'description',
        'description_bn',
        'image',
        'created_by',
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getTitleAttribute($value)
    {
        return $this->getTranslated('title', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getTranslated('description', $value);
    }
}
