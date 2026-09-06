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
            static $commonBlogs = null;
            static $commonCountriesVisa = null;

            if ($commonBlogs === null) {
                $commonBlogs = Blog::latest()->take(2)->get();
            }

            if ($commonCountriesVisa === null) {
                $commonCountriesVisa = CountryDetails::whereHas('visa_types')
                    ->with('country')
                    ->get();
            }

            $view->with('commonBlogs', $commonBlogs)
                 ->with('commonCountriesVisa', $commonCountriesVisa);
        });
    }
}
