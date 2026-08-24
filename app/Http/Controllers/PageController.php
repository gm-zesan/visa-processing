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
        $blogs = Blog::with('category')->get();
        $countriesVisa = CountryDetails::wherehas('visa_types')->with('visa_types')->get();
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
        $teamMember = OurTeam::find($id);
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
            $blogs = Category::where('id', $category)->first()->blogs;
        }else{
            $blogs = Blog::all();
        }
        $categories = Category::wherehas('blogs')->get();
        return view('frontend.blog_list', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function single_blog($slug){
        $categories = Category::wherehas('blogs')->get();
        $blog = Blog::findBySlug($slug);
        return view('frontend.single_blog',['blog' => $blog, 'categories' => $categories]);
    }
    public function country($id){
        $country = CountryDetails::find($id);
        $countryDetails = CountryDetails::wherehas('visa_types')->get();
        $visa_types = VisaType::where('country_details_id', $country->id)->get();
        return view('frontend.country', ['country' => $country, 'countryDetails' => $countryDetails, 'visa_types' => $visa_types]);
    }
    public function visa($slug){
        $visa = VisaType::findBySlug($slug);
        $available_visa = VisaType::where('country_details_id', $visa->country_details_id)->get();
        return view('frontend.visa', ['visa' => $visa, 'visas' => $available_visa]);
    }
}
