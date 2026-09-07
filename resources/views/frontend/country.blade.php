@extends('frontend.layouts.app')

@section('title')
{{ $country->subtitle ?? 'Working in ' . $country->country->name }} | Overseas Employment Guide
@endsection

@push("styles")
@vite(['resources/scss/frontend/country.scss'])
@endpush

@section('content')
    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025" id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#111A3A" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> {{ session('success') }}
        </div>
    @endif

    <!-- Breadcrumb / Hero Area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('58', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>Working in {{ $country->country->name }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">COUNTRIES</a></li>
                    <li class="breadcrumb-item active">{{ $country->country->name }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Country / Destination Content Area -->
    <div class="country_work_area">
      <div class="container">
        <div class="row row_gutters">
          <!-- Sidebar -->
          <div class="col-lg-4 mt_50">
            <div class="country_left_side">
              <!-- Destination Countries Navigation -->
              <div class="sidebar_section_title">
                <h4>Destination Countries</h4>
                <div class="em_bar_bg"></div>
              </div>
              <div class="country_lists mb_30">
                @foreach ($countryDetails as $ctry)
                    <a href="{{ route('country', ['id' => $ctry->id]) }}" class="{{ $ctry->id == $country->id ? 'active' : '' }}">
                      <span class="ctry_item_name">
                        @if(!empty($ctry->country->flag) && file_exists(public_path('flags/' . $ctry->country->flag)))
                          <img src="{{ asset('flags/' . $ctry->country->flag) }}" alt="{{ $ctry->country->name }}" class="sidebar_flag_img" loading="lazy">
                        @endif
                        <span>{{ $ctry->country->name }}</span>
                      </span>
                      <i class="fa-solid fa-chevron-right"></i>
                    </a>
                @endforeach
              </div>

              <!-- Country Quick Facts Card (100% Dynamic) -->
              <div class="country_facts_card mb_30">
                <div class="facts_card_header">
                  <i class="fa-solid fa-circle-info"></i>
                  <h3>{{ $country->country->name }} Quick Facts</h3>
                </div>
                <div class="facts_card_body">
                  <div class="fact_item">
                    <span class="fact_label"><i class="fa-solid fa-city"></i> Capital City:</span>
                    <span class="fact_value">{{ $country->country->capital ?? 'National Capital' }}</span>
                  </div>
                  <div class="fact_item">
                    <span class="fact_label"><i class="fa-solid fa-coins"></i> Currency:</span>
                    <span class="fact_value">{{ $country->country->currency ?? 'National Currency' }} ({{ $country->country->currency_code ?? '' }})</span>
                  </div>
                  @if(!empty($country->language))
                    <div class="fact_item">
                      <span class="fact_label"><i class="fa-solid fa-language"></i> Language:</span>
                      <span class="fact_value">{{ $country->language }}</span>
                    </div>
                  @endif
                  @if(!empty($country->processing_time))
                    <div class="fact_item">
                      <span class="fact_label"><i class="fa-solid fa-clock"></i> Processing:</span>
                      <span class="fact_value">{{ $country->processing_time }}</span>
                    </div>
                  @endif
                  <div class="fact_item">
                    <span class="fact_label"><i class="fa-solid fa-phone"></i> Dialing Code:</span>
                    <span class="fact_value">+{{ $country->country->calling_code ?? 'N/A' }}</span>
                  </div>
                  <div class="fact_item">
                    <span class="fact_label"><i class="fa-solid fa-globe"></i> ISO Standard:</span>
                    <span class="fact_value">{{ $country->country->iso_3166_2 ?? $country->country->country_code }}</span>
                  </div>
                  <div class="fact_item">
                    <span class="fact_label"><i class="fa-solid fa-passport"></i> Emigration:</span>
                    <span class="fact_value fact_highlight">BMET Approved</span>
                  </div>
                </div>
              </div>

              <!-- Call Us Assistance Area -->
              <div class="call_us_area mb_30">
                <img src="{{ asset(getSettingsData('59', 'image')) }}" alt="Assistance" class="w-100" loading="lazy" decoding="async">
                <div class="call_content">
                  <h2>{{ getSettingsData('59', 'title') }}</h2>
                  <a href="tel:+{{ getSettingsData('59', 'subtitle') }}"><i class="fa-solid fa-phone-volume"></i>+{{ getSettingsData('59', 'subtitle') }}</a>
                </div>
              </div>

              <!-- Apply CTA Box -->
              <div class="request_form_area text-center" style="padding: 3.5rem 2.5rem; background: #111A3A; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 0;">
                <i class="fa-solid fa-passport mb-3" style="font-size: 3.6rem; color: #C59A27;"></i>
                <h2 style="color: #FFFFFF; font-size: 2.2rem; font-family: 'Outfit', sans-serif; margin-bottom: 1rem;">Apply for Jobs in<br>{{ $country->country->name }}</h2>
                <p style="color: rgba(255, 255, 255, 0.75); font-size: 1.4rem; font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.6; margin-bottom: 2.5rem;">
                  Register directly with your valid Passport Number for official overseas job placement and fast-track processing.
                </p>
                <a href="{{ route('apply') }}" class="button w-100" style="display: flex; align-items: center; justify-content: center; column-gap: 0.8rem; padding: 1.5rem 2rem;">
                  <span>APPLY ONLINE NOW</span>
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Main Content -->
          <div class="col-lg-8 mt_50">
            <div class="country_right_side">
              <!-- Destination Hero Banner with Flag Badge -->
              <div class="destination_hero_card">
                <img src="{{ asset($country->image) }}" alt="{{ $country->country->name }}" class="destination_main_img" loading="lazy" decoding="async">
                <div class="destination_flag_badge">
                  @if(!empty($country->country->flag) && file_exists(public_path('flags/' . $country->country->flag)))
                    <img src="{{ asset('flags/' . $country->country->flag) }}" alt="{{ $country->country->name }}" class="destination_flag_svg">
                  @endif
                  <div class="destination_badge_text">
                    <span class="badge_super">DESTINATION GUIDE</span>
                    <span class="badge_title">{{ $country->country->name }}</span>
                  </div>
                </div>
              </div>

              <!-- Destination Overview -->
              <div class="country_block mt_40">
                <div class="country_section_heading">
                  <span class="sub_lead">EMPLOYMENT MARKET & LIFESTYLE</span>
                  <h2>Why Work in {{ $country->country->name }}</h2>
                  <div class="em_bar_bg"></div>
                  @if(!empty($country->subtitle))
                    <p class="section_subtitle" style="font-size: 1.6rem; color: #111A3A; font-weight: 600; margin-top: 0.5rem;">{{ $country->subtitle }}</p>
                  @endif
                </div>
                <div class="country_body_text">
                  {!! $country->description !!}
                </div>
              </div>

              <!-- High-Demand Employment Sectors (100% Dynamic) -->
              @if(!empty($country->sectors) && is_array($country->sectors) && count($country->sectors) > 0)
                <div class="country_block mt_40">
                  <div class="country_section_heading">
                    <span class="sub_lead">MAJOR RECRUITMENT OPPORTUNITIES</span>
                    <h2>High-Demand Sectors in {{ $country->country->name }}</h2>
                    <div class="em_bar_bg"></div>
                  </div>
                  <div class="row row_gutters sectors_grid">
                    @foreach ($country->sectors as $sector)
                      <div class="col-md-6 mb_20">
                        <div class="sector_card">
                          <div class="sector_icon"><i class="fa-solid {{ $sector['icon'] ?? 'fa-briefcase' }}"></i></div>
                          <div class="sector_info">
                            <h4>{{ $sector['title'] ?? 'Employment Sector' }}</h4>
                            <p>{{ $sector['description'] ?? '' }}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              <!-- Available Visas Section -->
              <div class="country_block mt_40">
                <div class="country_section_heading">
                  <h2>Available Visas for {{ $country->country->name }}</h2>
                  <div class="em_bar_bg"></div>
                </div>

                @forelse ($visa_types as $visa)
                  <div class="work_permit_showcase_card mb_25">
                    <div class="showcase_header" style="margin-bottom: 2rem; padding-bottom: 1.5rem; border-bottom: 1px solid #F1F5F9;">
                      <div class="showcase_title_wrap">
                        <h3 style="margin: 0; font-size: 2.2rem; font-family: 'Outfit', sans-serif; font-weight: 700; color: #111A3A;">{{ $visa->name }}</h3>
                        @if(!empty($visa->issuing_authority))
                          <p class="showcase_authority" style="font-size: 1.4rem; color: #64748B; margin: 0.6rem 0 0;">
                            <i class="fa-solid fa-building-columns" style="color: #C59A27; margin-right: 0.6rem;"></i>{{ $visa->issuing_authority }}
                          </p>
                        @endif
                      </div>
                      @if(!empty($country->country->flag) && file_exists(public_path('flags/' . $country->country->flag)))
                        <div class="showcase_flag">
                          <img src="{{ asset('flags/' . $country->country->flag) }}" alt="{{ $country->country->name }}" style="width: 4.2rem; height: 2.8rem; object-fit: cover; border: 1px solid #E2E8F0;">
                        </div>
                      @endif
                    </div>

                    <div class="showcase_action_row">
                      <a href="{{ route('visa', ['slug' => $visa->slug]) }}" class="btn_view_visa">
                        <span>View Details</span>
                        <i class="fa-solid fa-arrow-right"></i>
                      </a>
                      <a href="{{ route('apply') }}" class="btn_apply_visa">
                        <span>Apply Now</span>
                        <i class="fa-solid fa-paper-plane"></i>
                      </a>
                    </div>
                  </div>
                @empty
                  <div class="alert alert-info" style="border-radius: 0; background: #F8FAFC; border: 1px solid #CBD5E1; color: #111A3A;">
                    No visas found for {{ $country->country->name }}.
                  </div>
                @endforelse
              </div>

              <!-- Labor Regulations & Overseas Worker Protections (100% Dynamic) -->
              @if(!empty($country->worker_protections) && is_array($country->worker_protections) && count($country->worker_protections) > 0)
                <div class="country_block mt_40">
                  <div class="country_section_heading">
                    <span class="sub_lead">STATUTORY COMPLIANCE & SAFETY</span>
                    <h2>Labor Standards & Worker Protections</h2>
                    <div class="em_bar_bg"></div>
                  </div>

                  <div class="protections_grid">
                    @foreach ($country->worker_protections as $prot)
                      <div class="protection_card">
                        <div class="prot_icon"><i class="fa-solid {{ $prot['icon'] ?? 'fa-shield-halved' }}"></i></div>
                        <div class="prot_content">
                          <h4>{{ $prot['title'] ?? 'Worker Protection' }}</h4>
                          <p>{{ $prot['description'] ?? '' }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.style.opacity = 1;
                msg.style.top = '30px';
                msg.style.transition = 'all 0.3s ease-in-out';
                setTimeout(() => {
                    msg.style.opacity = 0;
                    msg.style.top = '-20px';
                    msg.style.transition = 'all 0.3s ease-in-out';
                }, 3000);
            }
        }, 100);
    </script>    
@endpush
