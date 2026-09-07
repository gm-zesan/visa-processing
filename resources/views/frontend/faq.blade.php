@extends('frontend.layouts.app')

@section('title')
{{ getSettingsData('47', 'title') ?? 'Frequently Asked Questions' }} | Overseas Work Permit Guidance
@endsection

@push("styles")
@vite(['resources/scss/frontend/faq.scss'])
@endpush

@section('content')
    <!-- Breadcrumb / Hero Area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('47', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('47', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('47', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- faq_area -->
    <div class="faq_area">
        <div class="container">
            <div class="choose_top text-center mb_40">
                <span class="sub_lead" style="color: #C59A27; font-weight: 700; font-size: 1.3rem; text-transform: uppercase; letter-spacing: 0.12em; display: block; margin-bottom: 0.6rem;">{{ getSettingsData('48', 'title') }}</span>
                <h2>{!! getSettingsData('48', 'description') !!}</h2>
                <div class="em_bar_bg mx-auto" style="height: 3px; width: 60px; background-color: #C59A27; margin: 1.2rem auto 2.5rem;"></div>
            </div>

            <div class="row row_gutters">
                <div class="col-lg-8">
                    <div class="accordion coustom_accordion" id="accordionFaq">
                        @foreach(getSettingsList('faq-accordion') as $key => $item) 
                            <div class="accordion-item mb_20">
                                <h2 class="accordion-header" id="heading{{ $item->id }}">
                                    <button class="accordion-button {{ $key === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $item->id }}">
                                        <span class="faq_num" style="display: inline-flex; align-items: center; justify-content: center; width: 2.8rem; height: 2.8rem; background: rgba(197, 154, 39, 0.12); color: #936F15; font-size: 1.3rem; font-weight: 700; border-radius: 4px; margin-right: 1.2rem; flex-shrink: 0;">{{ sprintf('%02d', $key + 1) }}</span>
                                        <span>{{ $item->title }}</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $item->id }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Side Assistance Box -->
                <div class="col-lg-4">
                    <div class="faq_sidebar_card" style="background: #111A3A; padding: 3.5rem 2.8rem; border-radius: 0; border: 1px solid rgba(197, 154, 39, 0.35); position: sticky; top: 100px;">
                        <div class="sidebar_icon text-center mb-3">
                            <i class="fa-solid fa-headset" style="font-size: 4rem; color: #C59A27;"></i>
                        </div>
                        <h3 style="color: #FFFFFF; font-family: 'Outfit', sans-serif; font-size: 2.2rem; font-weight: 700; text-align: center; margin-bottom: 1.2rem;">Still Have Questions?</h3>
                        <p style="color: rgba(255,255,255,0.75); font-size: 1.45rem; line-height: 1.6; text-align: center; margin-bottom: 2.5rem;">
                            Our licensed overseas placement counselors and visa specialists are ready to guide you through trade tests, medical clearances, and job contracts.
                        </p>
                        
                        <div class="helpline_box mb-4" style="background: rgba(255,255,255,0.06); padding: 1.6rem; border: 1px solid rgba(255,255,255,0.1); text-align: center;">
                            <span style="display: block; color: #C59A27; font-size: 1.2rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.4rem;">Direct Inquiry Helpline</span>
                            <a href="tel:+8801886271317" style="color: #FFFFFF; font-size: 2rem; font-weight: 800; font-family: 'Outfit', sans-serif; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.8rem;">
                                <i class="fa-solid fa-phone-volume" style="color: #C59A27; font-size: 1.8rem;"></i>
                                +880 1886-271317
                            </a>
                        </div>

                        <a href="{{ route('apply') }}" class="button w-100" style="background: #C59A27; color: #111A3A; font-weight: 700; font-size: 1.4rem; text-transform: uppercase; letter-spacing: 0.08em; padding: 1.4rem 2rem; display: flex; align-items: center; justify-content: center; gap: 0.8rem; border-radius: 0; text-decoration: none;">
                            <span>APPLY FOR WORK PERMIT</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <div class="mt-4 pt-3 text-center" style="border-top: 1px solid rgba(255,255,255,0.1);">
                            <span style="color: rgba(255,255,255,0.6); font-size: 1.25rem;">
                                <i class="fa-solid fa-shield-halved" style="color: #22C55E; margin-right: 0.5rem;"></i> BMET Govt. Approved Agency
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
