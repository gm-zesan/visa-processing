<?php

use App\Models\CommonType;
use App\Models\WebsiteContent;

// use App\Models\UserActivity;
// use App\Category;
// use App\User;
// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
// use DB;



function getAllWebsiteContents() {
    static $memoryCache = null;
    if ($memoryCache !== null) {
        return $memoryCache;
    }
    
    try {
        $memoryCache = \Illuminate\Support\Facades\Cache::rememberForever('all_website_contents', function () {
            return WebsiteContent::all();
        });
    } catch (\Throwable $e) {
        $memoryCache = WebsiteContent::all();
    }
    
    return $memoryCache;
}

function clearWebsiteContentCache() {
    \Illuminate\Support\Facades\Cache::forget('all_website_contents');
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







// function createUserActivity($request, $action, $description, $log_level, $email)
// {
//     $userActivity = new UserActivity();
//     $userActivity->action = $action;
//     $userActivity->email = $email ?? auth()->user()->name . '<' . auth()->user()->email . '>';
//     $userActivity->description = $description;
//     $userActivity->log_level = $log_level;
//     $userActivity->ip = $request->ip();
//     $userActivity->browser = $request->header('User-Agent');
//     $userActivity->save();
// }

// // last login helpers create
// function lastLoginUser()
// {
//     $date = Auth::user()->last_login;
//     $jplast_login = Carbon::parse($date)->format('Y/m/d H:i');
//     return $jplast_login;
// }

// function isChecked($optionId, $itemArray = array())
// {
//     $checked = false;
//     if (!empty($itemArray) && isset($optionId)) {
//         if (in_array($optionId, $itemArray)) {
//             $checked = true;
//         }
//     }
//     return $checked;
// }

// /**
//  * Unauthorized User
//  */

// function unauthorizedAccess($id)
// {
//     if (Auth::user()->id != $id) {
//         return true;
//     }
// }
