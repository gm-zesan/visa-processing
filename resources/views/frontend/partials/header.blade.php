<!-- header_top -->
<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <p>
                    <a href="mailto:info@alfahiminternational.com"><i class="fa-regular fa-envelope"></i>info@alfahiminternational.com</a>
                    <span><i class="fa-solid fa-location-dot"></i>Dhaka, Bangladesh</span>
                    <a href="tel:+8801700000000"><i class="fa-solid fa-phone"></i>+880 1700 000 000</a>
                </p>
            </div>
            <div class="col-lg-4">
                <ul class="text-end">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    <li style="margin-left: 15px; display: inline-block;">
                        <a href="{{ route('lang.switch', 'en') }}" style="{{ app()->getLocale() == 'en' ? 'font-weight: bold; color: var(--primary-color);' : '' }}">EN</a> 
                        <span style="color: #fff;">|</span> 
                        <a href="{{ route('lang.switch', 'bn') }}" style="{{ app()->getLocale() == 'bn' ? 'font-weight: bold; color: var(--primary-color);' : '' }}">BN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- main_header -->
<header>
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col-lg-2 col-sm-10 col-10">
                <!--logo start-->
                <a href="{{route('home')}}" class="logo">
                    <img src="{{ asset(getSettingsData('5', 'image')) }}" alt="AL FAHIM INTERNATIONAL Logo">
                </a>
                <!--logo end-->
            </div>
            <div class="col-lg-8 col-sm-2 col-2">
                <!--menu start-->
                <div class="menu">
                    <ul>
                        <li><a href="{{route('home')}}">{{ __('frontend.nav.home') }}</a></li>
                        <li><a href="{{route('about')}}">{{ __('frontend.nav.about_us') }}</a></li>
                        <li class="dropdown_wrap">
                            <a href="#">{{ __('frontend.nav.countries') }}</a>
                            <ul>
                                @foreach ($commonCountriesVisa as $commonCountryVisa)
                                    <li><a href="{{route('country',['id'=>$commonCountryVisa->id])}}">{{$commonCountryVisa->country->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('our_service')}}">{{ __('frontend.nav.services') }}</a></li>
                        <li><a href="{{route('ourTeam')}}">{{ __('frontend.nav.team') }}</a></li>
                        <li><a href="{{route('blog_list')}}">{{ __('frontend.nav.news') }}</a></li>
                        <li><a href="{{route('contact')}}">{{ __('frontend.nav.contact') }}</a></li>
                    </ul>
                </div>
                <!-- menu toggler -->
                <div class="hamburger-menu">
                    <span class="line-top"></span>
                    <span class="line-center"></span>
                    <span class="line-bottom"></span>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 d-none d-lg-block">
                <div class="text-end ">
                    <a href="{{route('apply')}}" class="apply_btn">{{ __('frontend.nav.apply_job') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
