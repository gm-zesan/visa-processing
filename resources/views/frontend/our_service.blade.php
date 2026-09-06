@extends('frontend.layouts.app')

@section('title')
Our Service
@endsection

@push("styles")

@vite(['resources/scss/frontend/our_service.scss'])
{{-- @vite(['resources/scss/frontend/our_service-dark.scss']) --}}
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('40', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('40', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('40', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- immigration_services_area -->
    <div class="immigration_services_area">
      <div class="container">
        <div class="row row_gutters">
          <div class="col-lg-6 mt_50">
            <img src="{{ asset(getSettingsData('41', 'image')) }}" alt="Image" class="w-100" loading="lazy" decoding="async">
          </div>
          <div class="col-lg-6 mt_50">
              <div class="choose_top">
                  <h3>{{ getSettingsData('41', 'title') }}</h3>
                  <h2><span>{{ getSettingsData('41', 'subtitle') }}</span>{{ getSettingsData('41', 'button_text') }}</h2>
                  <div class="em_bar_bg"></div>
              </div>
              {!! getSettingsData('41', 'description') !!}
          </div>
        </div>
      </div>
    </div>
    <!-- service_tourists -->
    <div class="service_tourists" style="background-image: url({{asset('frontend/images/shape_1.png')}});">
      <div class="container">
          <div class="resources_top">
              <div class="latest_news">
                  <span></span>
                  <h2>{{ getSettingsData('42', 'title') }}</h2>
              </div>
              {!! getSettingsData('42', 'description') !!}
          </div>
          <div class="swiper service_tourists_Swiper pt_50">
            <div class="swiper-wrapper">

                @foreach ($visaTypes as $visaType)
                    <div class="swiper-slide">
                        <div class="service_tourists_card">
                            <img src="{{asset($visaType->image)}}" alt="Image" class="w-100 visa_bg" loading="lazy" decoding="async">
                            <div class="service_tourists_cont">
                                <div class="service_tourists_icon">
                                <i class="fa-solid fa-bullseye"></i>
                                </div>
                                <h2>{{$visaType->name}}</h2>
                                <div>
                                    {!! Str::limit($visaType->description, 100, '...') !!}
                                </div>
                                <div style="position: relative">
                                    <a href="{{route('visa',['slug'=>$visaType->slug])}}" class="read_more_btn mt_40">Read More<i class="fa-solid fa-arrow-right"></i><img src="{{asset('frontend/images/arrow-right.png')}}" alt="Image" loading="lazy" decoding="async"></a></div>
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
    <!-- free_online_area -->
    <div class="free_online_area">
        <div class="container">
            <div class="free_online_wrap">
                <img src="{{ asset(getSettingsData('25', 'image')) }}" alt="Image" class="img-fluid" loading="lazy" decoding="async">
                <div class="free_content">
                    <h2>{{ getSettingsData('25', 'title') }}</h2>
                    <p>{!! getSettingsData('25', 'description') !!}</p>
                    <a href="{{ getSettingsData('25', 'button_link') }}" class="button">{{ getSettingsData('25', 'button_text') }}<i class="fa-solid fa-angle-right"></i></a>
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
                
            @foreach( getSettingsList('Home-choose-card') as $item) 
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

@push("scripts")
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