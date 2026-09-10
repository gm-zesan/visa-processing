@extends('frontend.layouts.app')

@section('title')
  {{ $visa->name }} | Overseas Employment & Work Permit
@endsection

@section('seo_description')
  {{ Str::limit(strip_tags($visa->description ?? 'Official processing details, legal documentation checklist, salary packages, and employer verification for ' . $visa->name . ' through AL FAHIM INTERNATIONAL.'), 160) }}
@endsection

@section('seo_image')
  {{ asset($visa->image ?? getSettingsData('5', 'image')) }}
@endsection

@push("styles")
  @vite(['resources/scss/frontend/visa.scss'])
@endpush

@section('content')
  @if(session('success'))
    <div
      style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025"
      id="success-message">
      <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
        <path fill="#111A3A"
          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
      </svg> {{ session('success') }}
    </div>
  @endif

  <!-- Breadcrumb / Hero Area -->
  <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('61', 'image')) }});">
    <div class="container">
      <div class="contact_wrapper">
        <h2>{{ $visa->name }}</h2>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
            <li class="breadcrumb-item"><a href="{{ route('our_service') }}">WORK PERMITS</a></li>
            @if($visa->countryDetails && $visa->countryDetails->country)
              <li class="breadcrumb-item"><a
                  href="{{ route('country', ['id' => $visa->countryDetails->id]) }}">{{ $visa->countryDetails->country->name }}</a>
              </li>
            @endif
            <li class="breadcrumb-item active">{{ $visa->name }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- Main Visa Processing Area -->
  <div class="country_work_area visa_details_area">
    <div class="container">
      <!-- Destination Cross-Link Notice Banner -->
      @if($visa->countryDetails && $visa->countryDetails->country)
        <div class="destination_crosslink_banner mb_40">
          <div class="crosslink_content">
            <div class="crosslink_icon">
              <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <div class="crosslink_text">
              <h4>Thinking About Moving to {{ $visa->countryDetails->country->name }}?</h4>
              <p>Get the facts on living costs, job opportunities, accommodation, and local culture in our complete
                {{ $visa->countryDetails->country->name }} Destination Guide.</p>
            </div>
          </div>
          <a href="{{ route('country', ['id' => $visa->countryDetails->id]) }}" class="btn_crosslink">
            <span>EXPLORE {{ strtoupper($visa->countryDetails->country->name) }} GUIDE</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      @endif

      <div class="row row_gutters">
        <!-- Sidebar -->
        <div class="col-lg-4 mt_30">
          <div class="country_left_side">
            <!-- Available Work Permit Visas Navigation -->
            <div class="sidebar_section_title">
              <h4>All Work Permits</h4>
              <div class="em_bar_bg"></div>
            </div>
            <div class="country_lists mb_30">
              @foreach ($visas as $vsa)
                <a href="{{ route('visa', ['slug' => $vsa->slug]) }}" class="{{ $vsa->id == $visa->id ? 'active' : '' }}">
                  <span class="visa_item_name">
                    @if($vsa->countryDetails && !empty($vsa->countryDetails->country->flag) && file_exists(public_path('flags/' . $vsa->countryDetails->country->flag)))
                      <img src="{{ asset('flags/' . $vsa->countryDetails->country->flag) }}" alt="{{ $vsa->name }}"
                        class="sidebar_flag_img" loading="lazy">
                    @endif
                    <span>{{ $vsa->name }}</span>
                  </span>
                  <i class="fa-solid fa-chevron-right"></i>
                </a>
              @endforeach
            </div>

            <!-- Destination Country Widget (100% Dynamic) -->
            @if($visa->countryDetails && $visa->countryDetails->country)
              <div class="destination_widget mb_30">
                <div class="widget_header">
                  <i class="fa-solid fa-earth-americas"></i>
                  <h3>Destination: {{ $visa->countryDetails->country->name }}</h3>
                </div>
                <div class="widget_body">
                  <div class="widget_item">
                    <span class="w_label"><i class="fa-solid fa-city"></i> Capital:</span>
                    <span class="w_val">{{ $visa->countryDetails->country->capital ?? 'Capital City' }}</span>
                  </div>
                  <div class="widget_item">
                    <span class="w_label"><i class="fa-solid fa-coins"></i> Currency:</span>
                    <span
                      class="w_val">{{ $visa->countryDetails->country->currency_code ?? $visa->countryDetails->country->currency }}</span>
                  </div>
                  @if(!empty($visa->countryDetails->language))
                    <div class="widget_item">
                      <span class="w_label"><i class="fa-solid fa-language"></i> Language:</span>
                      <span class="w_val">{{ $visa->countryDetails->language }}</span>
                    </div>
                  @endif
                  <div class="widget_item">
                    <span class="w_label"><i class="fa-solid fa-phone"></i> Dialing Code:</span>
                    <span class="w_val">+{{ $visa->countryDetails->country->calling_code ?? '' }}</span>
                  </div>
                  <a href="{{ route('country', ['id' => $visa->countryDetails->id]) }}" class="btn_widget_link mt-3">
                    <span>View {{ $visa->countryDetails->country->name }} Destination Guide</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            @endif

            <!-- Call Assistance Area -->
            <div class="call_us_area mb_30">
              <img src="{{ asset(getSettingsData('59', 'image')) }}" alt="Assistance" class="w-100" loading="lazy"
                decoding="async">
              <div class="call_content">
                <h2>{{ getSettingsData('59', 'title') ?: 'Need Visa Assistance?' }}</h2>
                @php
                  $visaHelpline = getSettingsData('59', 'subtitle') ?: (getSettingsData('44', 'title') ?: '+8801624238179');
                  $visaTel = preg_replace('/[^\d+]/', '', $visaHelpline);
                @endphp
                <a href="tel:{{ $visaTel }}"><i
                    class="fa-solid fa-phone-volume"></i>{{ $visaHelpline }}</a>
              </div>
            </div>

            <!-- Apply CTA Area -->
            <div class="request_form_area text-center"
              style="padding: 3.5rem 2.5rem; background: #111A3A; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 0;">
              <i class="fa-solid fa-passport mb-3" style="font-size: 3.6rem; color: #C59A27;"></i>
              <h2 style="color: #FFFFFF; font-size: 2.2rem; font-family: 'Outfit', sans-serif; margin-bottom: 1rem;">Apply
                for<br>{{ $visa->name }}</h2>
              <p
                style="color: rgba(255, 255, 255, 0.75); font-size: 1.4rem; font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.6; margin-bottom: 2.5rem;">
                Register directly with your valid Passport Number for official overseas visa processing, tracking, and
                BMET clearance.
              </p>
              <a href="{{ route('apply') }}" class="button w-100"
                style="display: flex; align-items: center; justify-content: center; column-gap: 0.8rem; padding: 1.5rem 2rem;">
                <span>APPLY ONLINE NOW</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-8 mt_30">
          <div class="country_right_side visa_main_content">
            <!-- Visa Banner Image -->
            <div class="visa_hero_card">
              <img src="{{ asset($visa->image) }}" alt="{{ $visa->name }}" class="visa_main_img" loading="lazy"
                decoding="async">
            </div>

            <!-- Visa Specifications Bar (100% Dynamic) -->
            <div class="visa_specs_grid mt_30">
              <div class="spec_item">
                <div class="spec_icon"><i class="fa-solid fa-id-card"></i></div>
                <div class="spec_details">
                  <span class="spec_label">Visa Category</span>
                  <span class="spec_value">{{ $visa->visa_category ?? 'Official Work Permit' }}</span>
                </div>
              </div>
              <div class="spec_item">
                <div class="spec_icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="spec_details">
                  <span class="spec_label">Destination</span>
                  <span class="spec_value">{{ $visa->countryDetails->country->name ?? 'Overseas' }}</span>
                </div>
              </div>
              <div class="spec_item">
                <div class="spec_icon"><i class="fa-solid fa-calendar-check"></i></div>
                <div class="spec_details">
                  <span class="spec_label">Contract Validity</span>
                  <span class="spec_value">{{ $visa->contract_period ?? '2 Years (Renewable)' }}</span>
                </div>
              </div>
              <div class="spec_item">
                <div class="spec_icon"><i class="fa-solid fa-clock"></i></div>
                <div class="spec_details">
                  <span class="spec_label">Processing Time</span>
                  <span class="spec_value">{{ $visa->processing_time ?? '30 - 45 Working Days' }}</span>
                </div>
              </div>
              @if(!empty($visa->issuing_authority))
                <div class="spec_item" style="grid-column: 1 / -1;">
                  <div class="spec_icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div class="spec_details">
                    <span class="spec_label">Issuing Government Authority</span>
                    <span class="spec_value">{{ $visa->issuing_authority }}</span>
                  </div>
                </div>
              @endif
            </div>

            <!-- Work Permit Statutory Overview & Facilities -->
            <div class="visa_content_block mt_40">
              <div class="visa_section_heading">
                <span class="sub_lead">STATUTORY WORK PERMIT OVERVIEW</span>
                <h2>{{ $visa->name }}</h2>
                <div class="em_bar_bg"></div>
              </div>
              <div class="visa_html_content">
                {!! $visa->description !!}
              </div>
            </div>



            <!-- Step-by-Step Processing Workflow (100% Dynamic) -->
            @if(!empty($visa->processing_steps) && is_array($visa->processing_steps) && count($visa->processing_steps) > 0)
              <div class="visa_content_block mt_40">
                <div class="visa_section_heading">
                  <span class="sub_lead">TRANSPARENT RECRUITMENT TIMELINE</span>
                  <h2>End-to-End Processing Workflow</h2>
                  <div class="em_bar_bg"></div>
                  <p class="section_intro">
                    Our end-to-end processing pipeline ensures 100% legal compliance, transparent milestone tracking, and
                    government-supervised deployment.
                  </p>
                </div>

                <div class="workflow_timeline">
                  @foreach($visa->processing_steps as $step)
                    <div class="timeline_card">
                      <div class="timeline_step">{{ $step['step'] ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                      <div class="timeline_info">
                        <h4>{{ $step['title'] ?? '' }}</h4>
                        <p>{{ $step['description'] ?? '' }}</p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            <!-- Fast-Track Application CTA Banner -->
            <div class="visa_apply_banner mt_40">
              <div class="banner_content">
                <div class="banner_icon"><i class="fa-solid fa-passport"></i></div>
                <div class="banner_text">
                  <h3>Ready to Apply for {{ $visa->name }}?</h3>
                  <p>Submit your application today with your valid Passport Number. Our specialized counselors will verify
                    your qualifications and guide your documentation.</p>
                </div>
              </div>
              <a href="{{ route('apply') }}" class="btn_banner_action">
                <span>APPLY ONLINE WITH PASSPORT</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>

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