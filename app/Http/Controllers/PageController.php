<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\CountryDetails;
use App\Models\OurTeam;
use App\Models\VisaType;

class PageController extends Controller
{
    public function index() {
        $blogs = Blog::with('category')->latest()->get();
        $countriesVisa = CountryDetails::whereHas('visa_types')->with(['visa_types', 'country'])->get();
        return view('frontend.index',['blogs' => $blogs, 'countriesVisa' => $countriesVisa]);
    }

    public function about(){
        return view('frontend.about');
    }
    public function ourTeam(){
        $teams = OurTeam::all();
        return view('frontend.ourTeam',['teams' => $teams]);
    }
    public function single_team($id){
        $teamMember = OurTeam::findOrFail($id);
        return view('frontend.single_team', ['teamMember' => $teamMember]);
    }
    public function our_service(){
        $visaTypes = VisaType::all();
        return view('frontend.our_service', ['visaTypes' => $visaTypes]);
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function faq(){
        return view('frontend.faq');
    }
    public function privacy(){
        return view('frontend.privacy');
    }
    public function termsofuse(){
        return view('frontend.termsofuse');
    }
    public function cookie(){
        return view('frontend.cookie');
    }
    public function helpcenter(){
        return view('frontend.helpcenter');
    }
    
    public function blog_list($category = null){
        if($category){
            $cat = Category::find($category);
            $blogs = $cat ? $cat->blogs()->with('category')->latest()->get() : collect();
        }else{
            $blogs = Blog::with('category')->latest()->get();
        }
        $categories = Category::whereHas('blogs')->get();
        return view('frontend.blog_list', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function single_blog($slug){
        $categories = Category::whereHas('blogs')->get();
        $blog = Blog::with('category')->where('slug', $slug)->firstOrFail();
        return view('frontend.single_blog',['blog' => $blog, 'categories' => $categories]);
    }
    public function country($id){
        $country = CountryDetails::with(['country', 'visa_types'])->findOrFail($id);
        $countryDetails = CountryDetails::whereHas('visa_types')->with('country')->get();
        $visa_types = $country->visa_types;
        return view('frontend.country', ['country' => $country, 'countryDetails' => $countryDetails, 'visa_types' => $visa_types]);
    }
    public function visa($slug){
        $visa = VisaType::where('slug', $slug)->firstOrFail();
        $all_visas = VisaType::all();
        return view('frontend.visa', ['visa' => $visa, 'visas' => $all_visas]);
    }
}
