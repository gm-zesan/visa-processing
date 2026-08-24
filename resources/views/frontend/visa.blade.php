@extends('frontend.layouts.app')

@section('title')
visa
@endsection

@push("styles")

@vite(['resources/scss/frontend/visa.scss'])
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('61', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{$visa->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
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
                    <a href="{{route('visa',['slug'=>$vsa->slug])}}" class="{{ $vsa->name == $visa->name ? 'active' : '' }}"><h3>{{$vsa->name}}</h3><i class="fa-solid fa-caret-right"></i></a>
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
            </div>
          </div>
          <div class="col-lg-8 mt_50">
              <div class="country_right_side">
                <img src="{{asset($visa->image)}}" alt="Image" class="w-100">
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
