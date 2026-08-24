@extends('frontend.layouts.app')

@section('title')
Privacy And Policy
@endsection

@push("styles")

@vite(['resources/scss/frontend/privacy.scss'])
<!-- @vite(['resources/scss/frontend/privacy-dark.scss']) -->
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('70', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('70', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('70', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- privacy_policy_area -->
    <div class="privacy_policy_area">
        <div class="container">
            <div class="choose_top">
                <h2>{{ getSettingsData('70', 'title') }}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="privacy_title">
                
            @foreach( getSettingsList('privacy-content-section') as $item) 
                <h2>{{ $item->title }}</h2>
                <p>{!! $item->description !!}</p>
            @endforeach
            </div>
        </div>
    </div>
@endsection
