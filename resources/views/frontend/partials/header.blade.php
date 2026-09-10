<!-- header_top -->
<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <p>
                    <a href="mailto:{{ getSettingsData('44', 'subtitle') ?: 'alfahiminternational944@gmail.com' }}"><i
                            class="fa-regular fa-envelope"></i>{{ getSettingsData('44', 'subtitle') ?:
                        'alfahiminternational944@gmail.com' }}</a>
                    <span><i
                            class="fa-solid fa-location-dot"></i>{{ (getSettingsData('44', 'button_text') && str_contains(getSettingsData('44', 'button_text'), 'Lift 14')) ? getSettingsData('44', 'button_text') : 'Tower A (Lift 14), House 13, Road 17, Banani, Dhaka.' }}</span>
                    <a href="tel:{{ getSettingsData('44', 'title') ?: '+8801624238179' }}"><i
                            class="fa-solid fa-phone"></i>{{ getSettingsData('44', 'title') ?: '+8801624238179' }}</a>
                </p>
            </div>
            <div class="col-lg-3">
                <ul class="text-end">
                    <li><a href="https://www.facebook.com/share/196jqwbpyM/" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
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
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li class="dropdown_wrap">
                            <a href="#">Countries</a>
                            <ul>
                                @foreach ($commonCountriesVisa as $commonCountryVisa)
                                    <li><a
                                            href="{{route('country', ['id' => $commonCountryVisa->id])}}">{{$commonCountryVisa->country->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('our_service')}}">Services</a></li>
                        <li><a href="{{route('ourTeam')}}">Team</a></li>
                        <li><a href="{{route('blog_list')}}">News</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
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
                    <a href="{{route('apply')}}" class="apply_btn">Apply for Job</a>
                </div>
            </div>
        </div>
    </div>
</header>