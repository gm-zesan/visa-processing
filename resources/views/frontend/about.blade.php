@extends('frontend.layouts.app')

@section('title')
    About Us - Authorized Manpower & Work Permit Agency
@endsection

@push("styles")
    @vite(['resources/scss/frontend/about.scss'])
@endpush

@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area"
        style="background-image: url({{ asset(getSettingsData('39', 'image') ?? 'frontend/images/contact_bg.jpg') }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('38', 'title') ?? 'About Us' }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-item active">{{ getSettingsData('38', 'title') ?? 'About Us' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- provider_area: About Company Info -->
    <div class="provider_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5" data-aos="flip-left">
                    <div class="provider_img">
                        <img src="{{ asset(getSettingsData('about-company-info', 'image') ?? 'frontend/images/about.png') }}"
                            alt="Licensed Manpower Agency" class="w-100" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-right">
                    <div class="choose_top">
                        <h3>{{ getSettingsData('11', 'title') ?? 'ABOUT OUR AGENCY' }}</h3>
                        <h2><span>{{ getSettingsData('11', 'subtitle') ?? 'Govt. Approved Overseas' }}</span>{{ getSettingsData('11', 'button_text') ?? 'Recruitment Agency' }}
                        </h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="education_content">
                        <h3>{{ getSettingsData('12', 'title') ?? 'Authorized Overseas Employment & Manpower Placement Services' }}
                        </h3>
                        <p>{{ getSettingsData('12', 'subtitle') }}</p>
                        <ul>
                            {!! getSettingsData('12', 'description') !!}
                        </ul>
                        <div class="dit-button mt_25">
                            <a href="{{ url(getSettingsData('12', 'button_link') ?? '/contact') }}">{{ getSettingsData('12', 'button_text') ?? 'Contact Recruitment Desk' }}<i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mission_vision_area: Mission, Vision & Core Values -->
    <div class="mission_vision_area">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <h3>{{ getSettingsData('about-mission-vision', 'title') ?? 'OUR COMMITMENT & PRINCIPLES' }}</h3>
                <h2><span>{{ getSettingsData('about-mission-vision', 'subtitle') ?? 'Mission, Vision & Core Values' }}</span>
                </h2>
                <div class="em_bar_bg mx-auto"></div>
                @if(getSettingsData('about-mission-vision', 'description'))
                    <div class="mission_intro_text">
                        {!! getSettingsData('about-mission-vision', 'description') !!}
                    </div>
                @endif
            </div>

            <div class="row row_gutters_sm">
                @foreach(getSettingsList('about-mission-card') as $item)
                    <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up">
                        <div class="appointment_cart mission_cart">
                            <div class="appointment_icon">
                                @if(!empty($item->button_link))
                                    <span><i class="{{ $item->button_link }}"></i></span>
                                @elseif(!empty($item->image))
                                    <span><img src="{{ asset($item->image) }}" alt="img" loading="lazy" decoding="async"></span>
                                @else
                                    <span><i class="fa-solid fa-bullseye"></i></span>
                                @endif
                            </div>
                            <div class="appointment_number">
                                <h4>0{{ $loop->iteration }}</h4>
                            </div>
                            <h2>{{ $item->title }}</h2>
                            @if(!empty($item->subtitle))
                                <h3>{{ $item->subtitle }}</h3>
                            @endif
                            <div class="mission_desc">
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ceo_speech_area: Message from Managing Director / CEO -->
    <div class="ceo_speech_area">
        <div class="container">
            <div class="row g-5 justify-content-between align-items-center">
                <div class="col-lg-5 pt_50" data-aos="flip-left">
                    <div class="ceo_img_wrap">
                        <img src="{{ asset(getSettingsData('about-ceo-speech', 'image') ?? 'upload/our_team/20240319041954.jpg') }}"
                            alt="{{ getSettingsData('about-ceo-speech', 'subtitle') ?? 'Hasibur Rahman Fahim' }}" class="w-100"
                            loading="lazy" decoding="async">
                        <div class="ceo_badge_tag">
                            <h4>{{ getSettingsData('about-ceo-speech', 'subtitle') ?? 'Hasibur Rahman Fahim' }}</h4>
                            <p>{{ getSettingsData('about-ceo-speech', 'extra') ?? 'Chief Executive Officer (CEO)' }}</p>
                            <span>AL FAHIM INTERNATIONAL &bull; RL-XXXX</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pt_50" data-aos="flip-right">
                    <div class="choose_top">
                        <h3>{{ getSettingsData('about-ceo-speech', 'title') ?? 'MESSAGE FROM LEADERSHIP' }}</h3>
                        <h2><span>A Message From Our</span> Chief Executive Officer</h2>
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="ceo_speech_body">
                        {!! getSettingsData('about-ceo-speech', 'description') !!}
                    </div>
                    <div class="ceo_executive_sign">
                        <div class="sign_details">
                            <h5>{{ getSettingsData('about-ceo-speech', 'subtitle') ?? 'Hasibur Rahman Fahim' }}</h5>
                            <p>Chief Executive Officer (CEO) &bull; Al Fahim International</p>
                            <span class="licence_num">Govt. Approved Recruiting Agency</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- licence_certifications_area: Licences & Official Accreditations -->
    <div class="licence_certifications_area">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <h3>{{ getSettingsData('about-licence-cert', 'title') ?? 'OFFICIAL RECOGNITIONS' }}</h3>
                <h2><span>{{ getSettingsData('about-licence-cert', 'subtitle') ?? 'Government Licences & Accreditations' }}</span>
                </h2>
                <div class="em_bar_bg mx-auto"></div>
                @if(getSettingsData('about-licence-cert', 'description'))
                    <div class="licence_intro_text">
                        {!! getSettingsData('about-licence-cert', 'description') !!}
                    </div>
                @else
                    <p class="licence_intro_text">Operating with full statutory authorization under the Government of the
                        People's
                        Republic of Bangladesh, accredited by international labor platforms and foreign diplomatic missions.</p>
                @endif
            </div>

            <div class="row row_gutters_sm">
                @foreach(getSettingsList('about-licence-card') as $item)
                    <div class="col-lg-6 col-md-12 mt_30" data-aos="fade-up">
                        <div class="accurate_guidance licence_item">
                            <div class="licence_icon">
                                @if(!empty($item->button_link))
                                    <i class="{{ $item->button_link }}"></i>
                                @elseif(!empty($item->image))
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="licence_img">
                                @else
                                    <i class="fa-solid fa-certificate"></i>
                                @endif
                            </div>
                            <div class="guidance_cont">
                                <div class="licence_title_row">
                                    <h3>{{ $item->title }}</h3>
                                    @if(!empty($item->button_text))
                                        <span class="licence_tag">{{ $item->button_text }}</span>
                                    @endif
                                </div>
                                @if(!empty($item->subtitle))
                                    <h4>{!! $item->subtitle !!}</h4>
                                @endif
                                <p>{!! $item->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- unparalleled_area / Overseas Employer CTA -->
    <div class="unparalleled_area"
        style="background-image: url({{ asset(getSettingsData('39', 'image') ?? 'frontend/images/unpara.jpg') }});">
        <div class="container">
            <h2>{{ getSettingsData('39', 'title') ?? 'Looking for Skilled & Certified Manpower?' }}<span>{{ getSettingsData('39', 'subtitle') ?? 'Partner With Bangladesh\'s Trusted Recruitment Agency' }}</span>
            </h2>
            <p>{!! getSettingsData('39', 'description') ?? 'Whether you need bulk recruitment for large-scale infrastructure projects in Saudi Arabia and the UAE, hospitality personnel for luxury Maldives resorts, factory technicians in Malaysia, or skilled tradesmen for Romania, we provide fully trade-tested, medically screened candidates with verified BMET emigration clearance.' !!}
            </p>
            <a href="{{ url(getSettingsData('39', 'button_link') ?? '/contact') }}"
                class="button mt_25">{{ getSettingsData('39', 'button_text') ?? 'Request Manpower Proposal' }}</a>
        </div>
    </div>



    <!-- dedicated_area: Registered Recruitment Experts -->
    <div class="dedicated_area" id="experts">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <h3>REGISTERED RECRUITMENT EXPERTS</h3>
                <h2><span>Meet Our Licensed</span> Manpower Specialists</h2>
                <div class="em_bar_bg mx-auto"></div>
            </div>
            <div class="row row_gutters_sm">
                @if(isset($teams) && count($teams) > 0)
                    @foreach($teams->take(3) as $team)
                        <div class="col-lg-4 col-sm-6 mt_30" data-aos="fade-up">
                            <div class="styles_card_dedi">
                                <div class="dedicated_card_wrap">
                                    <div class="team_inner_wrap">
                                        <div class="image_wrap">
                                            <img src="{{ asset($team->image ?? 'frontend/images/team_1.jpg') }}"
                                                alt="{{ $team->name }}" class="w-100" loading="lazy" decoding="async">
                                            <div class="social_icons1">
                                                @if(!empty($team->facebook))
                                                    <a href="{{ $team->facebook }}" target="_blank" rel="noopener" class="social-icon"
                                                        aria-label="Facebook">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                @endif
                                                @if(!empty($team->twitter))
                                                    <a href="{{ $team->twitter }}" target="_blank" rel="noopener" class="social-icon"
                                                        aria-label="Twitter">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                @endif
                                                @if(!empty($team->instagram))
                                                    <a href="{{ $team->instagram }}" target="_blank" rel="noopener" class="social-icon"
                                                        aria-label="Instagram">
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="team_content">
                                            <a href="{{ route('single_team', ['id' => $team->id]) }}">
                                                <h3>{{ $team->name }}</h3>
                                            </a>
                                            <p>{{ $team->designation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if(isset($teams) && count($teams) > 4)
                <div class="text-center mt_40">
                    <div class="dit-button">
                        <a href="{{ route('ourTeam') }}">View All Recruitment Specialists <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <!-- choose_area / about_choose_area: Statistics Counters -->
    <div class="choose_area about_choose_area">
        <div class="container">
            <div class="row row_gutters_sm" data-aos="flip-down">
                @foreach(getSettingsList('Home-choose-card') as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 mt_30">
                        <div class="choose_card_wrap">
                            @if(!empty($item->image))
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy" decoding="async">
                            @endif
                            <h2 class="counter" data-speed="1000">{{ $item->subtitle }}</h2>
                            <h3>{{ $item->title }}</h3>
                        </div>
                    </div>
                @endforeach
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