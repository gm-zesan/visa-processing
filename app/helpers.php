<?php

use App\Models\CommonType;
use App\Models\Theme;
use App\Models\WebsiteContent;
use Illuminate\Support\Facades\Cache;

function getAllWebsiteContents() {
    static $memoryCache = null;
    if ($memoryCache !== null) {
        return $memoryCache;
    }
    
    try {
        $memoryCache = Cache::rememberForever('all_website_contents', function () {
            return WebsiteContent::all();
        });
    } catch (\Throwable $e) {
        $memoryCache = WebsiteContent::all();
    }
    
    return $memoryCache;
}

function clearWebsiteContentCache() {
    Cache::forget('all_website_contents');
}

function getSettingsData($id, $field) {
    $contents = getAllWebsiteContents();
    $item = $contents->firstWhere('id', $id);
    if (!$item) {
        $item = $contents->firstWhere('link_key', $id);
    }
    return $item ? ($item->$field ?? null) : null;
}

function getSettingsList($key, $limit = null, $orderDirection = 'asc') {
    $contents = getAllWebsiteContents();
    $list = $contents->where('link_key', $key);
    
    if (strtolower($orderDirection) === 'desc') {
        $list = $list->sortByDesc('id');
    } else {
        $list = $list->sortBy('id');
    }
    
    if ($limit) {
        $list = $list->take($limit);
    }
    
    return $list->values();
}

/**
 * Get active dynamic color theme
 */
function getActiveTheme() {
    static $memoryTheme = null;
    if ($memoryTheme !== null) {
        return $memoryTheme;
    }

    try {
        $memoryTheme = Cache::rememberForever('active_theme_config', function () {
            return Theme::where('status', 1)->first() ?? Theme::first();
        });
    } catch (\Throwable $e) {
        $memoryTheme = Theme::where('status', 1)->first();
    }

    return $memoryTheme;
}

function clearActiveThemeCache() {
    Cache::forget('active_theme_config');
}

/**
 * Convert Hex Color to RGB format for CSS rgba() functions
 */
function hexToRgb($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } elseif (strlen($hex) >= 6) {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    } else {
        return '197, 154, 39'; // Default gold rgb
    }
    return "$r, $g, $b";
}
