@extends('frontend.layouts.app')

@section('title')
    Home
@endsection

@push('styles')
    @php
        $firstHero = getSettingsList('home-hero-section')->first();
    @endphp
    @if($firstHero && !empty($firstHero->image))
        <link rel="preload" as="image" href="{{ asset($firstHero->image) }}" fetchpriority="high">
    @endif
    @vite(['resources/scss/frontend/home.scss'])
@endpush


@section('content')
    <!-- home_area -->
    <div class="home_area">
        <div class="swiper home_area_swiper">
            <div class="swiper-wrapper">

                @foreach (getSettingsList('home-hero-section') as $item)
                    <div class="swiper-slide">
                        <div class="home_wrapper" style="background-image: url({{ asset($item->image) }});">
                            <div class="container">
                                <h2>{{ $item->title }}</h2>
                                <h1>{{ $item->subtitle }}</h1>
                                <p>{!! $item->description !!}</p>
                                <div class="dit-button mt_20">
                                    <a href="{{ $item->button_link }}">{{ $item->button_text }} <i
                                            class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
            <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
        </div>
    </div>

    <!-- appointment_area -->
    <div class="appointment_area">
        <div class="container">
            <div class="appointment_wrapper">
                <div class="row row_gutters_sm">

                    @foreach (getSettingsList('home-appointment-section') as $item)
                        @if ($item->subtitle == '01')
                            <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-right">
                            @elseif($item->subtitle == '02')
                                <div class="col-lg-4 col-sm-6 mt_30">
                                @elseif($item->subtitle == '03')
                                    <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-left">
                                    @else
                                        <div class="col-lg-4 col-sm-6 mt_30">
                        @endif
                        <div class="appointment_cart">
                            <div class="appointment_icon">
                                <span><img src="{{ asset($item->image) }}" alt="img" loading="lazy" decoding="async"></span>
                            </div>
                            <div class="appointment_number">
                                <h4>{{ $item->subtitle }}</h4>
                            </div>
                            <h2>{{ $item->title }}</h2>
                            <p>{!! $item->description !!}</p>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- provider_area -->
    <div class="provider_area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 pt_50" data-aos="flip-left">
                    <div class="provider_img">
                        <img src="{{ asset('frontend/images/about.png') }}" alt="Image" class="w-100" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="col-lg-6 pt_50" data-aos="flip-right">
                    <div class="choose_top">
                        <h3>{{ getSettingsData('11', 'title') }}</h3>
                        <h2><span>{{ getSettingsData('11', 'subtitle') }}</span>{{ getSettingsData('11', 'button_text') }}
                        </h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="education_content">
                        <h3>{{ getSettingsData('12', 'title') }}</h3>
                        <p>{{ getSettingsData('12', 'subtitle') }}</p>
                        <ul>
                            {!! getSettingsData('12', 'description') !!}
                        </ul>
                        <div class="dit-button mt_20">
                            <a href="{{ getSettingsData('12', 'button_link') }}">{{ getSettingsData('12', 'button_text') }}<i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- secure_visa_wrapper -->
    <div class="securce_visa_wrapper" style="background-image: url({{ asset(getSettingsData('13', 'image')) }});">
        <div class="container news_container">
            <img src="{{ asset('frontend/images/newz-flag.gif') }}" alt="Image" class="newz_flag_posi" loading="lazy" decoding="async">
            <div class="row">
                <div class="col-lg-4 securce_top mt_50">
                    <div class="choose_top">
                        <h3>WORK PERMIT VISAS</h3>
                        <h2><span>{{ getSettingsData('13', 'title') }}</span> {{ getSettingsData('13', 'subtitle') }}</h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    {!! getSettingsData('13', 'description') !!}
                    <div class="dit-button mt_20">
                        <a href="{{ getSettingsData('13', 'button_link') }}">{{ getSettingsData('13', 'button_text') }}<i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-8 mt_50">
                    <div class="swiper securce_visa_Swiper">
                        <div class="swiper-wrapper">

                            @foreach (getSettingsList('home-secure-slider') as $item)
                                <div class="swiper-slide">
                                    <div class="securce_visa_card">
                                        <img src="{{ asset($item->image) }}" alt="img" loading="lazy" decoding="async">
                                        <div class="choose_country_cont">
                                            <h2>{{ $item->title }}</h2>
                                            {!! $item->description !!}</p>
                                            <a href="{{ $item->button_link }}"
                                                class="read_btn_2">{{ $item->button_text }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- choose_country_area -->
    <div class="choose_country_area" style="background-image: url({{ asset('frontend/images/choose_country.png') }});">
        <div class="container">
            <div class="choose_top">
                <h3>TARGET DESTINATIONS</h3>
                <h2><span>Overseas Employment - Choose</span> Your Destination!</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="swiper choose_country_Swiper">
                <div class="swiper-wrapper">

                    @foreach ($countriesVisa as $countryVisa)
                        <div class="swiper-slide">
                            <div class="choose_country_card">
                                <img src="{{ asset($countryVisa->image) }}" alt="Image" class="w-100" loading="lazy" decoding="async">
                                <div class="choose_country_cont">
                                    <div class="choose_country_flag">
                                        <img src="{{ asset('flags/' . $countryVisa->country->flag) }}" alt="Image" loading="lazy" decoding="async">
                                    </div>
                                    <h2>{{ $countryVisa->country->name }}</h2>
                                    <div>
                                        {!! Str::limit($countryVisa->description, 88, '...') !!}
                                    </div>
                                    <a href="{{ route('country', ['id' => $countryVisa->id]) }}" class="read_btn">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- testimonial_area -->
    <div class="testimonial_area" style="background-image: url({{ asset(getSettingsData('20', 'image')) }});">
        <div class="container">
            <div class="choose_top">
                <h3>{{ getSettingsData('20', 'title') }}</h3>
                <h2>{{ getSettingsData('20', 'subtitle') }}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="swiper testimonial_Swiper">
                <div class="swiper-wrapper">

                    @foreach (getSettingsList('home-testimonial-slider') as $item)
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
    <!-- free_online_area -->
    <div class="free_online_area">
        <div class="container">
            <div class="free_online_wrap">
                <img src="{{ asset(getSettingsData('25', 'image')) }}" alt="Image" class="img-fluid" loading="lazy" decoding="async">
                <div class="free_content">
                    <h2>{{ getSettingsData('25', 'title') }}</h2>
                    <p>{!! getSettingsData('25', 'description') !!}</p>
                    <a href="{{ getSettingsData('25', 'button_link') }}"
                        class="button">{{ getSettingsData('25', 'button_text') }}<i
                            class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- choose_area -->
    <div class="choose_area">
        <div class="container">
            <div class="choose_top">
                <h3>{{ getSettingsData('26', 'title') }}</h3>
                <h2>{{ getSettingsData('26', 'title') }}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="row row_gutters_sm" data-aos="flip-down">

                @foreach (getSettingsList('Home-choose-card') as $item)
                    <div class="col-lg-3 col-sm-6 mt_30">
                        <div class="choose_card_wrap">
                            <img src="{{ asset($item->image) }}" alt="img" loading="lazy" decoding="async">
                            <h2 class="counter" data-speed="1000">{{ $item->subtitle }}</h2>
                            <h3>{{ $item->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- resources_area -->
    <div class="resources_area pt_50 pb_50">
        <div class="container">
            <div class="resources_top">
                <div class="latest_news_header">
                    <div class="section_tag">
                        <span></span>
                        Latest News & Insights
                    </div>
                    <h2>Resources & Work Permit News</h2>
                    <p>Stay informed with authentic government notices, overseas hiring quotas, and visa regulations.</p>
                </div>
                <div class="resources_controls">
                    <div class="resources-btn-prev" role="button" aria-label="Previous Slide"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="resources-btn-next" role="button" aria-label="Next Slide"><i class="fa-solid fa-chevron-right"></i></div>
                    <a href="{{ route('blog_list') }}" class="btn_view_all_news">
                        <span>View All News</span>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            <div class="resources_wrap">
                <div class="swiper resources_Swiper">
                    <div class="swiper-wrapper">
                        @foreach ($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="resources_card">
                                    <a href="{{ route('single_blog', ['slug' => $blog->slug]) }}" class="resources_img">
                                        @if($blog->category)
                                            <div class="student_top">{{ $blog->category->name }}</div>
                                        @endif
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" loading="lazy" decoding="async">
                                    </a>
                                    <div class="resources_cont">
                                        <div class="blog-meta-row">
                                            <span class="meta-item"><i class="fa-regular fa-user"></i> {{ $blog->created_by ?? 'AL FAHIM Team' }}</span>
                                            <span class="meta-divider">&bull;</span>
                                            <span class="meta-item"><i class="fa-regular fa-calendar"></i> {{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="{{ route('single_blog', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="blog-excerpt">
                                            {{ Str::limit(strip_tags($blog->description), 95, '...') }}
                                        </p>
                                        <div class="blog-card-bottom">
                                            <a href="{{ route('single_blog', ['slug' => $blog->slug]) }}" class="read_more_btn">
                                                <span>Read Article</span>
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="resources-pagination mt-4 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- single_brand -->
    <div class="single_brand_area pt_50 pb_50">
        <div class="container">
            <div class="swiper mySwipers">
                <div class="swiper-wrapper">

                    @foreach (getSettingsList('home-single-brand-section') as $item)
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
                const duration = 1200; // ms
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
