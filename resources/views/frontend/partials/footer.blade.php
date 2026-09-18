<!-- ======= Footer ======= -->
<footer class="footer" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom">
    <div class="container">
        <div class="row">
           <div class="col-lg-3 col-sm-6 footer_first_item pt_40">
                <a href="{{route('home')}}" class="f_logo">
                    <img src="{{ asset(getSettingsData('5', 'image')) }}" alt="AL FAHIM INTERNATIONAL" style="max-height: 55px; object-fit: contain;" loading="lazy" decoding="async">
                </a>
                <p>{{ __('frontend.footer.about_text') }}</p>
                <h4>{{ __('frontend.footer.follow_us') }}</h4>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_secoend_item pt_40">
                <h3>{{ __('frontend.footer.destination_countries') }}</h3>
                <ul>
                    @foreach ($commonCountriesVisa as $commonCountryVisa)
                        <li><a href="{{route('country',['id'=>$commonCountryVisa->id])}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.working_in', ['country' => $commonCountryVisa->country->name]) }}</a></li>
                    @endforeach
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_three_item pt_40">
                <h3>{{ __('frontend.footer.quick_links') }}</h3>
                <ul>
                    <li><a href="{{route('about')}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.about_us') }}</a></li>
                    <li><a href="{{route('apply')}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.apply_online') }}</a></li>
                    <li><a href="{{route('our_service')}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.work_permits') }}</a></li>
                    <li><a href="{{route('ourTeam')}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.our_team') }}</a></li>
                    <li><a href="{{route('contact')}}"><i class="fa-solid fa-arrow-right"></i>{{ __('frontend.footer.contact_us') }}</a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_four_item pt_40">
                <h3>{{ __('frontend.footer.latest_updates') }}</h3>
                @foreach ($commonBlogs as $blog)
                    <div class="footer_galary pb_10">
                        <a href="{{route('single_blog', ['slug'=>$blog->slug])}}">
                            <img src="{{asset($blog->image)}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                        </a>
                        <div>
                            <h4><a href="{{route('single_blog', ['slug'=>$blog->slug])}}">{{$blog->title}}</a></h4>
                            <p>{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </div>
</footer>
<!-- footer_bottom -->
<div class="footer_bottom">
    <div class="container">
        <div class="foot_bottom_wrap">
        <p>Copyright © {{ date('Y') }} AL FAHIM INTERNATIONAL. All rights reserved.</p>
        <ul>
            <li><a href="{{route('faq')}}">{{ __('frontend.footer.faq') }}</a></li>
            <li><a href="{{route('privacy')}}">{{ __('frontend.footer.privacy_policy') }}</a></li>
            <li><a href="{{route('termsofuse')}}">{{ __('frontend.footer.terms_of_use') }}</a></li>
        </ul>
        </div>
    </div>
</div>
<!-- back to top -->
<a href="#" class="back-to-top"><i class="fa-solid fa-angle-up"></i></a>