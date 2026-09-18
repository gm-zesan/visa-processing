<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HasTranslations
{
    /**
     * Get the translated value of an attribute.
     *
     * @param string $attribute The base attribute name (e.g. 'title')
     * @param mixed $default The fallback/default value (usually the English text)
     * @return mixed
     */
    public function getTranslated(string $attribute, $default = null)
    {
        if (request()->is('dashboard*') || request()->is('admin*')) {
            return $default;
        }

        $locale = App::getLocale();
        $bnAttribute = $attribute . '_bn';

        if ($locale === 'bn') {
            $bnValue = $this->attributes[$bnAttribute] ?? null;
            if (!empty($bnValue)) {
                return $bnValue;
            }
        }

        return $default;
    }
}
