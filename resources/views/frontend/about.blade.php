@extends('frontend.layouts.app')

@section('title')
about
@endsection

@push("styles")

@vite(['resources/scss/frontend/about.scss'])
{{-- @vite(['resources/scss/frontend/about-dark.scss']) --}}
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('39', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('38', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('38', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- provider_area -->
    <div class="provider_area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 pt_50" data-aos="flip-left">
                    <div class="provider_img">
                        <img src="{{asset('frontend/images/about.png')}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="col-lg-6 pt_50" data-aos="flip-right">
                    <div class="choose_top">
                        <h3>{{ getSettingsData('11', 'title') }}</h3>
                        <h2><span>{{ getSettingsData('11', 'subtitle') }}</span>{{ getSettingsData('11', 'button_text') }}</h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="education_content">
                        <h3>{{ getSettingsData('12', 'title') }}</h3>
                        <p>{{ getSettingsData('12', 'subtitle') }}</p>
                        <ul>
                            {!! getSettingsData('12', 'description') !!}
                        </ul>
                        <div class="dit-button mt_20">
                            <a href="{{ getSettingsData('12', 'button_link') }}">{{ getSettingsData('12', 'button_text') }}<i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- unparalleled_area -->
    <div class="unparalleled_area" style="background-image: url({{asset('frontend/images/unpara.jpg')}});">
      <div class="container">
        <h2>{{ getSettingsData('39', 'title') }}<span>{{ getSettingsData('39', 'subtitle') }}</span></h2>
        <p>{!! getSettingsData('39', 'description') !!}</p>
        <a href="{{ getSettingsData('39', 'button_link') }}" class="button mt_20">{{ getSettingsData('39', 'button_text') }}</a>
      </div>
    </div>
    <!-- Dedicated_area -->
    <div class="dedicated_area">
        <div class="container">
            <div class="choose_top">
                <h3>PROFESSIONAL TEAM</h3>
                <h2>Meet Our Dedicated Team</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mt_40">
                    <div class="styles_card_dedi">
                        <div class="dedicated_card_wrap">
                            <div class="team_inner_wrap">
                                <div class="image_wrap">
                                    <img src="{{asset('frontend/images/team_1.jpg')}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                                    <div class="social_icons1">				            								
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        </a>			                                               
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-twitter"></i>
                                        </a>			                                           
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-instagram"></i>
                                        </a>			 
                                    </div>
                                </div>
                                <div class="team_content">
                                    <a href="#"><h3>Angel Zara</h3></a>
                                    <p>RECRUITMENT SPECIALIST</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt_40">
                    <div class="styles_card_dedi">
                        <div class="dedicated_card_wrap">
                            <div class="team_inner_wrap">
                                <div class="image_wrap">
                                    <img src="{{asset('frontend/images/team_2.jpg')}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                                    <div class="social_icons1">				            								
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        </a>			                                               
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-twitter"></i>
                                        </a>			                                           
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-instagram"></i>
                                        </a>			 
                                    </div>
                                </div>
                                <div class="team_content">
                                    <a href="#"><h3>Angel Zara</h3></a>
                                    <p>RECRUITMENT SPECIALIST</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt_40">
                    <div class="styles_card_dedi">
                        <div class="dedicated_card_wrap">
                            <div class="team_inner_wrap">
                                <div class="image_wrap">
                                    <img src="{{asset('frontend/images/team_3.jpg')}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                                    <div class="social_icons1">				            								
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        </a>			                                               
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-twitter"></i>
                                        </a>			                                           
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-instagram"></i>
                                        </a>			 
                                    </div>
                                </div>
                                <div class="team_content">
                                    <a href="#"><h3>Angel Zara</h3></a>
                                    <p>RECRUITMENT SPECIALIST</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt_40">
                    <div class="styles_card_dedi">
                        <div class="dedicated_card_wrap">
                            <div class="team_inner_wrap">
                                <div class="image_wrap">
                                    <img src="{{asset('frontend/images/team_4.jpg')}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                                    <div class="social_icons1">				            								
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        </a>			                                               
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-twitter"></i>
                                        </a>			                                           
                                        <a href="" class="social-icon">
                                        <i class="fa-brands fa-instagram"></i>
                                        </a>			 
                                    </div>
                                </div>
                                <div class="team_content">
                                    <a href="#"><h3>Angel Zara</h3></a>
                                    <p>RECRUITMENT SPECIALIST</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose_area -->
    <div class="choose_area about_choose_area">
        <div class="container">
            <div class="row row_gutters_sm" data-aos="flip-down">

            @foreach( getSettingsList('Home-choose-card') as $item) 
            <div class="col-lg-3 col-md-6 col-sm-6 mt_30">
                    <div class="choose_card_wrap">
                        @if(!empty($item->image))
                            <img src="{{ asset($item->image) }}" alt="img" loading="lazy" decoding="async">
                        @endif
                        <h2 class="counter" data-speed="1000">{{ $item->subtitle }}</h2>
                        <h3>{{ $item->title }}</h3>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial_area -->
    <div class="testimonial_area about_testimonial">
        <div class="container">
            <div class="choose_top">
                <h3>{{ getSettingsData('20', 'title') }}</h3>
                <h2>{{ getSettingsData('20', 'subtitle') }}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="swiper testimonial_Swiper">
                <div class="swiper-wrapper">
                    
                @foreach( getSettingsList('home-testimonial-slider') as $item) 
                <div class="swiper-slide">
                        <div class="texti_card">
                            <div class="testi_thumb">
                                <img src="{{ asset($item->image) }}" alt="Image" class="w-100" loading="lazy" decoding="async">
                            </div>
                            <p>{!! $item->description !!}</p>
                            <div class="testi_title">
                            </div>
                            <h2>{{ $item->title }}<span>{{ $item->subtitle }}</span></h2>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
   <!-- single_brand -->
    <div class="single_brand_area pt_50 pb_50">
        <div class="container">
            <div class="swiper mySwipers">
                <div class="swiper-wrapper">
                    
                @foreach( getSettingsList('home-single-brand-section') as $item) 
                <div class="swiper-slide">
                        <div class="single_brand_card">
                            <img src="{{ asset($item->image) }}" alt="Image" class="img-fluid" loading="lazy" decoding="async">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll(".counter");
            counters.forEach((item) => {
                const text = item.textContent.trim();
                const target = parseInt(text.replace(/[^\d]/g, ''), 10);
                if (isNaN(target)) return;

                const suffix = text.replace(/[\d\s]/g, '');
                let current = 0;
                const duration = 1200;
                const steps = 30;
                const increment = target / steps;
                const stepTime = duration / steps;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    item.textContent = Math.floor(current) + suffix;
                }, stepTime);
            });
        });
    </script>
@endpush
