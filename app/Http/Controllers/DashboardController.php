<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TourPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Inertia;
use Inertia\Response;
class DashboardController extends Controller
{
    public function index(){
        //get latest packages take(3)
        $packages = User::latest()->take(3)->get();
        $blogs = User::latest()->take(3)->get();
        // count total users
        $total_users = User::count();
        $total_packages = User::count();
        $total_blogs = User::count();
        return view('admin.home.index',['packages'=>$packages,'blogs'=>$blogs,'total_users'=>$total_users,'total_packages'=>$total_packages,'total_blogs'=>$total_blogs]);
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }
    public function myProfile()
    {
        return view('profile.my-profile');
    }

    // pass data in app.blade.php file
    // public function getUserData(){
    //     $user_id = auth()->user()->id;
    //     $user = User::find($user_id);
    //     return view('admin.app',compact('user'));
    // }
}
