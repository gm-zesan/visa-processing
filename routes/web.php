<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CommonTypeController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\VisaTypeController;
use App\Http\Controllers\WebsiteContentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PageController::class,'index'])->name('home');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::get('/ourTeam', [PageController::class,'ourTeam'])->name('ourTeam');
Route::get('/single_team/{id}', [PageController::class,'single_team'])->name('single_team');
Route::get('/our_service', [PageController::class,'our_service'])->name('our_service');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::get('/faq', [PageController::class,'faq'])->name('faq');
Route::get('/privacy', [PageController::class,'privacy'])->name('privacy');
Route::get('/termsofuse', [PageController::class,'termsofuse'])->name('termsofuse');
Route::get('/cookie', [PageController::class,'cookie'])->name('cookie');
Route::get('/helpcenter', [PageController::class,'helpcenter'])->name('helpcenter');
Route::get('/single_blog/{slug}', [PageController::class,'single_blog'])->name('single_blog');
Route::get('/blog_list', [PageController::class,'blog_list'])->name('blog_list');
Route::get('/blog_list/{category}', [PageController::class,'blog_list'])->name('blog_filter');
Route::get('/country/{id}', [PageController::class,'country'])->name('country');
Route::get('/visa/{slug}', [PageController::class,'visa'])->name('visa');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// message send route
Route::post('/message/store', [ContactFormController::class,'store'])->name('message.store');
Route::post('/appointment/store', [AppointmentController::class,'store'])->name('appointment.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password-change', [DashboardController::class, 'changePassword'])->name('password-change.profile');
    Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('profile.view');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    // Ck editor routes
    Route::get('ckeditor', [CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


    // theme Route
    Route::get('/dashboard/theme', [ThemeController::class,'index'])->name('theme');
    Route::get('/dashboard/theme/create', [ThemeController::class,'create'])->name('theme.create');
    Route::post('/dashboard/theme/store', [ThemeController::class,'store'])->name('theme.store');
    Route::get('/dashboard/theme/edit/{id}', [ThemeController::class,'edit'])->name('theme.edit');
    Route::post('/dashboard/theme/update/{id}', [ThemeController::class,'update'])->name('theme.update');
    Route::get('/dashboard/theme/delete/{id}', [ThemeController::class,'delete'])->name('theme.delete');
    Route::get('/dashboard/theme/activate/{id}', [ThemeController::class,'activate'])->name('theme.active');


    // commontype Route
    Route::get('/dashboard/common-type', [CommonTypeController::class,'index'])->name('commontypes');
    Route::get('/dashboard/common-type/create', [CommonTypeController::class,'create'])->name('commontype.create');
    Route::post('/dashboard/common-type/store', [CommonTypeController::class,'store'])->name('commontype.store');
    Route::get('/dashboard/common-type/edit/{id}', [CommonTypeController::class,'edit'])->name('commontype.edit');
    Route::post('/dashboard/common-type/update/{id}', [CommonTypeController::class,'update'])->name('commontype.update');
    Route::get('/dashboard/common-type/delete/{id}', [CommonTypeController::class,'delete'])->name('commontype.delete');


    // website.content Route
    Route::get('/dashboard/website-content', [WebsiteContentController::class,'index'])->name('website-contents');
    Route::get('/dashboard/website-content/create', [WebsiteContentController::class,'create'])->name('website-content.create');
    Route::post('/dashboard/website-content/store', [WebsiteContentController::class,'store'])->name('website-content.store');
    Route::get('/dashboard/website-content/edit/{id}', [WebsiteContentController::class,'edit'])->name('website-content.edit');
    Route::post('/dashboard/website-content/update/{id}', [WebsiteContentController::class,'update'])->name('website-content.update');
    Route::get('/dashboard/website-content/delete/{id}', [WebsiteContentController::class,'delete'])->name('website-content.delete');


    // User Route
    Route::get('/dashboard/users', [UserController::class,'index'])->name('users');
    Route::get('/dashboard/user/create', [UserController::class,'create'])->name('user.create');
    Route::post('/dashboard/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/dashboard/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('/dashboard/user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('/dashboard/user/delete/{id}', [UserController::class,'delete'])->name('user.delete');

    // Role Route
    Route::get('/dashboard/role', [RoleController::class,'index'])->name('role.index');
    Route::get('/dashboard/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/dashboard/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/dashboard/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::post('/dashboard/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    Route::get('/dashboard/role/delete/{id}', [RoleController::class,'destroy'])->name('role.delete');

    // Assign Role Route
    Route::get('/dashboard/assign-role', [AssignRoleController::class,'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class,'assignRole'])->name('assignrole.store');


    //message Route
    Route::get('/dashboard/message', [ContactFormController::class,'index'])->name('message');
    Route::get('/dashboard/message/delete/{id}', [ContactFormController::class,'delete'])->name('message.delete');




    // main
    // category Route
    Route::get('/dashboard/categories', [CategoryController::class,'index'])->name('categories');
    Route::get('/dashboard/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/dashboard/category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/dashboard/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/dashboard/category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
    
    // BLog Route
    Route::get('/dashboard/blogs', [BlogController::class,'index'])->name('blogs');
    Route::get('/dashboard/blog/create', [BlogController::class,'create'])->name('blog.create');
    Route::post('/dashboard/blog/store', [BlogController::class,'store'])->name('blog.store');
    Route::get('/dashboard/blog/edit/{id}', [BlogController::class,'edit'])->name('blog.edit');
    Route::post('/dashboard/blog/update/{id}', [BlogController::class,'update'])->name('blog.update');
    Route::get('/dashboard/blog/delete/{id}', [BlogController::class,'delete'])->name('blog.delete');

    // our_team Route
    Route::get('/dashboard/our-team', [OurTeamController::class,'index'])->name('our-team');
    Route::get('/dashboard/our-team/create', [OurTeamController::class,'create'])->name('our-team.create');
    Route::post('/dashboard/our-team/store', [OurTeamController::class,'store'])->name('our-team.store');
    Route::get('/dashboard/our-team/edit/{id}', [OurTeamController::class,'edit'])->name('our-team.edit');
    Route::post('/dashboard/our-team/update/{id}', [OurTeamController::class,'update'])->name('our-team.update');
    Route::get('/dashboard/our-team/delete/{id}', [OurTeamController::class,'delete'])->name('our-team.delete');

    // Countries Route
    Route::get('/dashboard/countries', [CountriesController::class,'index'])->name('countries');
    Route::get('/dashboard/country/create', [CountriesController::class,'create'])->name('country.create');
    Route::post('/dashboard/country/store', [CountriesController::class,'store'])->name('country.store');
    Route::get('/dashboard/country/edit/{id}', [CountriesController::class,'edit'])->name('country.edit');
    Route::post('/dashboard/country/update/{id}', [CountriesController::class,'update'])->name('country.update');
    Route::get('/dashboard/country/delete/{id}', [CountriesController::class,'delete'])->name('country.delete');

    // visa type routes
    Route::get('/dashboard/visa_type', [VisaTypeController::class,'index'])->name('visa_type');
    Route::get('/dashboard/visa_type/create', [VisaTypeController::class,'create'])->name('visa_type.create');
    Route::post('/dashboard/visa_type/store', [VisaTypeController::class,'store'])->name('visa_type.store');
    Route::get('/dashboard/visa_type/edit/{id}', [VisaTypeController::class,'edit'])->name('visa_type.edit');
    Route::post('/dashboard/visa_type/update/{id}', [VisaTypeController::class,'update'])->name('visa_type.update');
    Route::get('/dashboard/visa_type/delete/{id}', [VisaTypeController::class,'delete'])->name('visa_type.delete');
    
    //appointment Route
    Route::get('/dashboard/appointment', [AppointmentController::class,'index'])->name('appointment');
    Route::get('/dashboard/appointment/delete/{id}', [AppointmentController::class,'delete'])->name('appointment.delete');

});

require __DIR__.'/auth.php';
