@extends('frontend.layouts.app')

@section('title')
Terms of Use
@endsection


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('63', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('63', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">T{{ getSettingsData('63', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- privacy_policy_area -->
    <div class="privacy_policy_area">
        <div class="container">
            <div class="choose_top">
                <h2>{{ getSettingsData('63', 'title') }}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="privacy_title">
                
            @foreach( getSettingsList('terms-content-section') as $item) 
                <h2>{{ $item->title }}</h2>
                <p>{!! $item->description !!}</p>
            @endforeach
            </div>
        </div>
    </div>
@endsection
