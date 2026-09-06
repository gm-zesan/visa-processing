@extends('frontend.layouts.app')

@section('title')
    Our Work Permit Services - Licensed Manpower Agency
@endsection

@push("styles")
    @vite(['resources/scss/frontend/our_service.scss'])
    {{-- @vite(['resources/scss/frontend/our_service-dark.scss']) --}}
@endpush

@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area"
        style="background-image: url({{ asset(getSettingsData('40', 'image') ?? 'frontend/images/contact_bg.jpg') }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('40', 'title') ?? 'Our Work Permit Services' }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-item active">{{ getSettingsData('40', 'title') ?? 'Our Services' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- immigration_services_area: Overview & Key Pillars -->
    <div class="immigration_services_area">
        <div class="container">
            <div class="row row_gutters align-items-center">
                <div class="col-lg-6 mt_50" data-aos="flip-left">
                    <div class="service_feature_img">
                        <img src="{{ asset(getSettingsData('41', 'image') ?? 'frontend/images/about.png') }}"
                            alt="Work Permit Recruitment Services" class="w-100" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="col-lg-6 mt_50" data-aos="flip-right">
                    <div class="choose_top">
                        <h3>{{ getSettingsData('41', 'title') ?? 'OVERSEAS RECRUITMENT & WORK PERMIT SOLUTIONS' }}</h3>
                        <h2><span>{{ getSettingsData('41', 'subtitle') ?? 'End-to-End Deployment From' }}</span>
                            {{ getSettingsData('41', 'button_text') ?? 'Licensed Manpower Specialists' }}</h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    {!! getSettingsData('41', 'description') !!}
                    <div class="dit-button mt_30">
                        <a href="{{ route('apply') }}">Apply For Work Permit <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- core_services_area: Comprehensive 6-Pillar Manpower Processing Services -->
    <div class="core_services_area">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <h3>MANPOWER RECRUITMENT SOLUTIONS</h3>
                <h2><span>Our Full-Spectrum</span> Recruitment & Deployment Services</h2>
                <div class="em_bar_bg mx-auto"></div>
                <p class="section_intro_desc">Operating under Government of Bangladesh approval (RL-XXXX), we manage
                    the entire overseas employment lifecycle from initial sourcing to airport departure.</p>
            </div>
            <div class="row row_gutters_sm">
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-users-viewfinder"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>01</h4>
                        </div>
                        <h2>Candidate Sourcing</h2>
                        <h3>Nationwide Talent Pool</h3>
                        <p>Mobilizing skilled, semi-skilled, and technical personnel across Bangladesh through our verified
                            database of pre-registered applicants matching precise job specifications.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up" data-aos-delay="100">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>02</h4>
                        </div>
                        <h2>Technical Trade Testing</h2>
                        <h3>Practical Skill Assessment</h3>
                        <p>Certified workshop testing for construction trades, pipe fitters, structural welders (3G/6G),
                            industrial electricians, heavy equipment operators, and hospitality staff.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up" data-aos-delay="200">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-heart-pulse"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>03</h4>
                        </div>
                        <h2>Bio-Medical Screening</h2>
                        <h3>GAMCA / Wafid Medicals</h3>
                        <p>Computerized medical appointments and pre-screening through authorized diagnostic centers
                            ensuring 100% compliance with Gulf Health Council and destination standards.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-id-card-clip"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>04</h4>
                        </div>
                        <h2>BMET Emigration Clearance</h2>
                        <h3>Smart Immigration Cards</h3>
                        <p>Complete administrative filing with the Bureau of Manpower, Employment and Training (BMET),
                            mandatory biometric fingerprinting, and pre-departure briefing (PDO) orientation.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up" data-aos-delay="100">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-passport"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>05</h4>
                        </div>
                        <h2>Embassy Visa Stamping</h2>
                        <h3>Direct Consular Portals</h3>
                        <p>Direct electronic visa endorsement through official foreign platforms including Saudi Qiwa &
                            Enjaz, UAE MoHRE, Malaysian Calling Visa (FWCMS), and Romanian Immigration (IGI).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up" data-aos-delay="200">
                    <div class="appointment_cart service_box_cart">
                        <div class="appointment_icon">
                            <span><i class="fa-solid fa-plane-departure"></i></span>
                        </div>
                        <div class="appointment_number">
                            <h4>06</h4>
                        </div>
                        <h2>Airport Departure Support</h2>
                        <h3>Safe Flight Deployment</h3>
                        <p>Ticketing coordination, transit guidelines, baggage regulations briefing, and dedicated 24/7
                            on-ground assistance at Hazrat Shahjalal International Airport, Dhaka.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service_tourists: Destination Work Permit Programs -->
    <div class="service_tourists">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <h3>{{ getSettingsData('42', 'title') ?? 'TARGET WORK PERMIT DESTINATIONS' }}</h3>
                <h2><span>Official Government-Approved</span> Work Permit Programs</h2>
                <div class="em_bar_bg mx-auto"></div>
                @if(getSettingsData('42', 'description'))
                    <div class="service_desc_intro">
                        {!! getSettingsData('42', 'description') !!}
                    </div>
                @endif
            </div>

            <div class="row row_gutters_sm">
                @foreach ($visaTypes as $visaType)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt_30" data-aos="fade-up">
                        <div class="service_tourists_card">
                            <div class="visa_thumb_wrap">
                                <img src="{{ asset($visaType->image) }}" alt="{{ $visaType->name }}" class="w-100 visa_bg"
                                    loading="lazy" decoding="async">
                                @if($visaType->countryDetails && $visaType->countryDetails->country)
                                    <div class="visa_country_badge">
                                        @if(!empty($visaType->countryDetails->country->flag))
                                            <img src="{{ asset('flags/' . $visaType->countryDetails->country->flag) }}"
                                                alt="{{ $visaType->countryDetails->country->name }}" class="country_flag_mini">
                                        @endif
                                        <span>{{ $visaType->countryDetails->country->name }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="service_tourists_cont">
                                <div class="service_tourists_icon">
                                    <i class="fa-solid fa-passport"></i>
                                </div>
                                <h2>{{ $visaType->name }}</h2>
                                <p class="visa_desc_excerpt">
                                    {{ Str::limit(strip_tags($visaType->description), 115, '...') }}
                                </p>
                                <div class="visa_card_actions">
                                    <a href="{{ route('visa', ['slug' => $visaType->slug]) }}" class="read_more_btn">
                                        <span>Details & Requirements</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- free_online_area: Eligibility Assessment & Consultation CTA -->
    <div class="free_online_area service_cta_area">
        <div class="container">
            <div class="free_online_wrap">
                <img src="{{ asset(getSettingsData('25', 'image') ?? 'frontend/images/about.png') }}"
                    alt="Work Permit Assessment" class="img-fluid" loading="lazy" decoding="async">
                <div class="free_content">
                    <h2>{{ getSettingsData('25', 'title') ?? 'Free Overseas Job Assessment & Trade Verification' }}</h2>
                    <p>{!! getSettingsData('25', 'description') ?? 'Consult our licensed consular specialists to verify your eligibility for active employer quotas across Saudi Arabia, UAE, Maldives, Malaysia, and Romania.' !!}</p>
                    <a href="{{ url(getSettingsData('25', 'button_link') ?? '/apply') }}"
                        class="button">{{ getSettingsData('25', 'button_text') ?? 'Apply For Work Permit' }}<i
                            class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection