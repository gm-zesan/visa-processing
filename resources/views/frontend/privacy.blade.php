@extends('frontend.layouts.app')

@section('title')
{{ getSettingsData('70', 'title') ?? 'Privacy Policy' }} | Candidate Data Protection
@endsection

@push("styles")
@vite(['resources/scss/frontend/country.scss'])
@endpush

@section('content')
    <!-- Breadcrumb / Hero Area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('70', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('70', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">PRIVACY POLICY</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- privacy_policy_area -->
    <div class="privacy_policy_area" style="padding: 6rem 0 8rem; background: #FAFBFD;">
        <div class="container">
            <div class="row row_gutters">
                <div class="col-lg-8">
                    <div class="privacy_content_wrapper" style="background: #FFFFFF; border: 1px solid #E2E8F0; padding: 4rem 3.5rem; box-shadow: 0 4px 20px rgba(17,26,58,0.03);">
                        <div class="policy_header mb_30" style="border-bottom: 2px solid #F1F5F9; padding-bottom: 2rem;">
                            <span class="sub_lead" style="color: #C59A27; font-weight: 700; font-size: 1.3rem; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 0.5rem;">STATUTORY DATA PRIVACY</span>
                            <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.8rem; font-weight: 800; color: #111A3A; margin-bottom: 0.8rem;">{{ getSettingsData('70', 'title') }}</h1>
                            <div class="em_bar_bg" style="height: 3px; width: 60px; background-color: #C59A27; margin-bottom: 1.2rem;"></div>
                            <p style="color: #64748B; font-size: 1.45rem; line-height: 1.6; margin: 0;">{{ getSettingsData('70', 'subtitle') }}</p>
                        </div>

                        <div class="privacy_sections">
                            @foreach(getSettingsList('privacy-content-section') as $item) 
                                <div class="policy_item_block mb_35" style="border-bottom: 1px solid #F1F5F9; padding-bottom: 2.5rem;">
                                    <h2 style="font-family: 'Outfit', sans-serif; font-size: 2.1rem; font-weight: 700; color: #111A3A; margin-bottom: 1.4rem; display: flex; align-items: center; gap: 1rem;">
                                        <i class="fa-solid fa-shield-halved" style="color: #C59A27; font-size: 1.8rem;"></i>
                                        <span>{{ $item->title }}</span>
                                    </h2>
                                    <div class="policy_body" style="font-size: 1.5rem; line-height: 1.8; color: #475569;">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Side Overview Card -->
                <div class="col-lg-4">
                    <div class="privacy_sidebar" style="position: sticky; top: 100px;">
                        <!-- Quick Highlights Box -->
                        <div class="policy_side_box mb_30" style="background: #FFFFFF; border: 1px solid #E2E8F0; padding: 2.8rem 2.4rem; border-top: 4px solid #C59A27;">
                            <h4 style="font-family: 'Outfit', sans-serif; font-size: 1.8rem; font-weight: 700; color: #111A3A; margin-bottom: 1.5rem;">Data Protection Principles</h4>
                            <ul style="list-style: none; padding-left: 0; margin: 0;">
                                <li style="padding: 0.8rem 0; border-bottom: 1px solid #F1F5F9; font-size: 1.35rem; color: #334155; display: flex; align-items: center; gap: 0.8rem;">
                                    <i class="fa-solid fa-lock" style="color: #C59A27;"></i>
                                    <span>256-Bit SSL Encrypted Transmissions</span>
                                </li>
                                <li style="padding: 0.8rem 0; border-bottom: 1px solid #F1F5F9; font-size: 1.35rem; color: #334155; display: flex; align-items: center; gap: 0.8rem;">
                                    <i class="fa-solid fa-user-shield" style="color: #C59A27;"></i>
                                    <span>BMET Govt. Compliance Standards</span>
                                </li>
                                <li style="padding: 0.8rem 0; border-bottom: 1px solid #F1F5F9; font-size: 1.35rem; color: #334155; display: flex; align-items: center; gap: 0.8rem;">
                                    <i class="fa-solid fa-ban" style="color: #C59A27;"></i>
                                    <span>Zero Commercial Data Selling</span>
                                </li>
                                <li style="padding: 0.8rem 0; font-size: 1.35rem; color: #334155; display: flex; align-items: center; gap: 0.8rem;">
                                    <i class="fa-solid fa-vault" style="color: #C59A27;"></i>
                                    <span>Fireproof Physical Passport Vault</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Help Box -->
                        <div class="policy_side_box" style="background: #111A3A; border: 1px solid rgba(197, 154, 39, 0.35); padding: 3rem 2.4rem; text-align: center;">
                            <i class="fa-solid fa-envelope-circle-check mb-3" style="font-size: 3.5rem; color: #C59A27;"></i>
                            <h4 style="color: #FFFFFF; font-family: 'Outfit', sans-serif; font-size: 1.9rem; font-weight: 700; margin-bottom: 0.8rem;">Privacy Desk</h4>
                            <p style="color: rgba(255,255,255,0.75); font-size: 1.35rem; line-height: 1.55; margin-bottom: 2rem;">
                                Have questions regarding passport retention or document verification?
                            </p>
                            <a href="{{ route('contact') }}" class="button w-100" style="background: #C59A27; color: #111A3A; font-weight: 700; font-size: 1.35rem; text-transform: uppercase; padding: 1.2rem 1.8rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.8rem; text-decoration: none;">
                                <span>CONTACT COMPLIANCE</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
