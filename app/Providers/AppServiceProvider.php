<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\CountryDetails;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $blogs = Blog::latest()->take(2)->get();
            $country = CountryDetails::wherehas('visa_types')->get();
            $view->with('commonBlogs', $blogs)->with('commonCountriesVisa', $country);
        });
    }
}
