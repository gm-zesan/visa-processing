@extends('frontend.layouts.app')

@section('title')
{{$visa->name}}
@endsection

@push("styles")
@vite(['resources/scss/frontend/visa.scss'])
@endpush

@section('content')
    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025" id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#111A3A" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> {{ session('success') }}
        </div>
    @endif
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('61', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{$visa->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item"><a href="{{route('our_service')}}">WORK PERMITS</a></li>
                    <li class="breadcrumb-item active">{{$visa->name}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- country_work_area -->
    <div class="country_work_area">
      <div class="container">
        <div class="row row_gutters">
          <div class="col-lg-4 mt_50">
            <div class="country_left_side">
              <div class="country_lists mb_30">
                @foreach ($visas as $vsa)
                    <a href="{{route('visa',['slug'=>$vsa->slug])}}" class="{{ $vsa->id == $visa->id ? 'active' : '' }}"><h3>{{$vsa->name}}</h3><i class="fa-solid fa-caret-right"></i></a>
                @endforeach
              </div>
              <!-- call_us_area -->
              <div class="call_us_area mb_30">
                <img src="{{ asset(getSettingsData('59', 'image')) }}" alt="Image" class="w-100">
                <div class="call_content">
                  <h2>{{ getSettingsData('59', 'title') }}</h2>
                  <a href="tel:+{{ getSettingsData('59', 'subtitle') }}"><i class="fa-solid fa-phone-volume"></i>+{{ getSettingsData('59', 'subtitle') }}</a>
                </div>
              </div>
              <!-- apply_cta_box -->
              <div class="request_form_area text-center" style="padding: 3.5rem 2.5rem; background: #111A3A; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 0;">
                <i class="fa-solid fa-passport mb-3" style="font-size: 3.6rem; color: #C59A27;"></i>
                <h2 style="color: #FFFFFF; font-size: 2.2rem; font-family: 'Outfit', sans-serif; margin-bottom: 1rem;">Apply for {{ $visa->name }}</h2>
                <p style="color: rgba(255, 255, 255, 0.75); font-size: 1.4rem; font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.6; margin-bottom: 2.5rem;">
                  Register directly with your valid Passport Number for official overseas visa processing and tracking.
                </p>
                <a href="{{ route('apply') }}" class="button w-100" style="display: flex; align-items: center; justify-content: center; column-gap: 0.8rem; padding: 1.5rem 2rem;">
                  <span>APPLY ONLINE NOW</span>
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt_50">
              <div class="country_right_side">
                <img src="{{asset($visa->image)}}" alt="Image" class="w-100" style="border-radius: 8px; max-height: 420px; object-fit: cover;">
                <div class="country_title">
                  <h2>{{$visa->name}}</h2>
                    {!! $visa->description !!}
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
