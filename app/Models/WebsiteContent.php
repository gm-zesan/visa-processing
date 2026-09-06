<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'hints',
        'link_key',
        'theme_id',
        'page_name',
        'title',
        'title_label',
        'subtitle',
        'subtitle_label',
        'button_text',
        'button_text_label',
        'button_link',
        'button_link_label',
        'description',
        'description_label',
        'image',
        'image_label',
    ];

    public function commonType()
    {
        return $this->belongsTo(CommonType::class, 'page_name', 'name');
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
