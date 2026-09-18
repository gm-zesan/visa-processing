<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    use HasFactory, \App\Traits\HasTranslations;
    protected $fillable = [
        'hints',
        'link_key',
        'theme_id',
        'page_name',
        'title',
        'title_bn',
        'title_label',
        'subtitle',
        'subtitle_bn',
        'subtitle_label',
        'button_text',
        'button_text_bn',
        'button_text_label',
        'button_link',
        'button_link_label',
        'description',
        'description_bn',
        'description_label',
        'image',
        'image_label',
    ];

    public function commonType()
    {
        return $this->belongsTo(CommonType::class, 'page_name', 'name');
    }

    public function getTitleAttribute($value)
    {
        return $this->getTranslated('title', $value);
    }

    public function getSubtitleAttribute($value)
    {
        return $this->getTranslated('subtitle', $value);
    }

    public function getButtonTextAttribute($value)
    {
        return $this->getTranslated('button_text', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getTranslated('description', $value);
    }

    protected static function booted()
    {
        static::saved(function () {
            if (function_exists('clearWebsiteContentCache')) {
                clearWebsiteContentCache();
            }
        });

        static::deleted(function () {
            if (function_exists('clearWebsiteContentCache')) {
                clearWebsiteContentCache();
            }
        });
    }
}
