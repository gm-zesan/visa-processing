<?php

use App\Models\CommonType;
use App\Models\WebsiteContent;

// use App\Models\UserActivity;
// use App\Category;
// use App\User;
// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
// use DB;



function getSettingsData($id, $field) {
    return WebsiteContent::where('id', $id)->first()->$field;
}

function getSettingsList($key, $limit = null, $orderDirection = 'asc') {
    $query = WebsiteContent::where('link_key', $key);
    
    if ($orderDirection) {
        $query->orderBy('id', $orderDirection);
    }
    if ($limit) {
        $query->limit($limit);
    }
    return $query->get();
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
